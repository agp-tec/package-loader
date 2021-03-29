<?php
/**
 *
 * Data e hora: 2020-06-25 16:08:40
 * Observer gerada automaticamente
 *
 */


namespace App\Controller\Web;


use Agp\BaseUtils\Helper\Utils;
use App\Controller\Controller;
use App\Form\PessoaForm;
use App\Model\Entity\Pessoa;
use App\Reports\PessoaReport;
use Facades\App\Model\Repository\PessoaRepository;
use Facades\App\Model\Service\PessoaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Kris\LaravelFormBuilder\Form;


class PessoaController extends Controller
{
    public function index()
    {
        $report = new PessoaReport();
        return view('pessoa.index', compact('report'));
    }

    public function find()
    {
        return view('pessoa.find');
    }

    public function doFind(Request $request)
    {
        $cpf = str_replace(['.', '-', ' '], '', $request['cpf_email']);
        if ($cpf) {
            if (is_numeric($cpf)) {
                $value = Utils::mask('###.###.###-##', $cpf);
                $attribute = 'doc';
                $rules = ['doc' => 'formato_cpf|cpf|required'];
                $messages = ['doc.*' => 'Digite um "CPF" válido'];
            } else {
                $value = $request->cpf_email;
                $attribute = 'email';
                $rules = ['email' => 'string|min:6|max:65|required|email'];
                $messages = ['email.*' => 'Digite um "Email" válido'];
            }
        } else
            throw ValidationException::withMessages(['message' => 'Insira um "CPF" ou "e-mail" válido']);

        Validator::make([$attribute => $value], $rules, $messages)->validate();
        $pessoa = PessoaRepository::getByAttribute($attribute, $value);
        if ($pessoa)
            return redirect()->route('web.pessoa.edit', ['pessoa' => $pessoa->id])->with('success', 'Registro Encontrado. Atualize os dados se desejar.');

        return redirect()->route('web.pessoa.create', [$attribute => $value]);
    }

    public function datatable(Request $request)
    {
        $pagination = $request->get('pagination');
        if ($pagination) {
            $request->merge([
                'per_page' => $pagination['perpage'],
                'page' => $pagination['page']
            ]);
        }
        return response()->json(PessoaRepository::datatableData());
    }

    public function create(Pessoa $obj)
    {
        $form = $this->getForm($obj);
        return view('pessoa.create', ['form' => $form]);
    }


    public function store(Pessoa $pessoa)
    {
        $rules = PessoaService::prepareRulesAndRequest(request()->all(), $pessoa->getRules());
        $form = $this->getForm($pessoa, $rules);
        $data = $form->submit();
        $pessoa->sync($data);
        PessoaService::store($pessoa);
        return redirect()->route('web.pessoa.edit', ['pessoa' => $pessoa->getKey()]);
    }

    public function edit(Pessoa $pessoa)
    {
        $form = $this->getForm($pessoa);
        return view('pessoa.edit', ['form' => $form]);
    }

    public function update(Pessoa $pessoa)
    {
        $rules = PessoaService::prepareRulesAndRequest(request()->all(), $pessoa->getRules());
        $form = $this->getForm($pessoa, $rules);
        $data = $form->submit();
        $pessoa->sync($data);
        PessoaService::store($pessoa);
        return redirect()->route('web.pessoa.edit', ['pessoa' => $pessoa->id])->with('success', 'Cliente atualizado.');
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->cliente->delete();
        return redirect()->route('web.pessoa.index')->with('success', 'Cliente removido.');
    }

    /**
     * @param Pessoa $pessoa
     * @param array $rules
     * @return Form
     */
    public function getForm(Pessoa $pessoa, $rules = null)
    {
        $form = FormBuilder::create(PessoaForm::class, [
            'method' => $pessoa->exists ? 'PUT' : 'POST',
            'url' => $pessoa->exists ? route('web.pessoa.update', ['pessoa' => $pessoa->id]) : route('web.pessoa.store'),
            'model' => $pessoa
        ]);
        $form->validate($rules ? $rules : $pessoa->getRules(), $pessoa->getMessages());
        return $form;
    }
}

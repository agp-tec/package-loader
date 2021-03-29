<?php
/**
 *
 * Data e hora: 2021-01-05 16:54:22
 * Controller/Web gerada automaticamente
 *
 */


namespace App\Controller\Web;


use Agp\BaseUtils\Helper\Utils;
use App\Controller\Controller;
use App\Form\PessoaEnderecoForm;
use App\Model\Entity\Pessoa;
use App\Model\Entity\PessoaEndereco;
use Facades\App\Model\Repository\PessoaEnderecoRepository;
use Facades\App\Model\Service\PessoaEnderecoService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Kris\LaravelFormBuilder\Facades\FormBuilder;


class PessoaEnderecoController extends Controller
{
    public function find(Pessoa $pessoa)
    {
        return view('pessoa-endereco.find', compact('pessoa'));
    }

    public function doFind(Pessoa $pessoa)
    {
        $cep = str_replace(['.', '-', ' '], '', request()->get('cep'));

        if ($cep) {
            $messages = ['cep.*' => 'Digite um CEP válido.'];

            Validator::make(['cep' => Utils::mask('#####-###', $cep)], ['cep' => 'formato_cep|required'], $messages)->validate();

            return redirect()->route('web.pessoa-endereco.create', ['pessoa' => $pessoa->id, 'cep' => request()->get('cep')]);

        } else
            throw ValidationException::withMessages(['message' => 'Digite um CEP.']);
    }

    public function create(Pessoa $pessoa)
    {
        $pessoaEndereco = new PessoaEndereco();
        $pessoaEndereco->pessoa()->associate($pessoa);

        $form = $this->getForm($pessoaEndereco, $pessoaEndereco->pessoa);
        return view('pessoa-endereco.create', ['form' => $form, 'pessoa' => $pessoaEndereco->pessoa]);
    }

    public function getForm(PessoaEndereco $pessoaEndereco, Pessoa $pessoa = null)
    {
        $form = FormBuilder::create(PessoaEnderecoForm::class, [
            'method' => $pessoaEndereco->exists ? 'PUT' : 'POST',
            'url' => $pessoaEndereco->exists ? route('web.pessoa-endereco.update', ['pessoa' => $pessoaEndereco->pessoa, 'pessoa_endereco' => $pessoaEndereco->id]) : route('web.pessoa-endereco.store', ['pessoa' => $pessoa->id]),
            'model' => $pessoaEndereco
        ]);
        $form->validate($pessoaEndereco->getRules(), $pessoaEndereco->getMessages());
        return $form;
    }

    public function store(Pessoa $pessoa, PessoaEndereco $pessoaEndereco)
    {
        if (request()->get('descricao') == null)
            request()->merge([
                'descricao' => $pessoa->enderecos->count() <= 0 ? 'Endereço Principal' : 'Endereço #' . $pessoa->enderecos->count()
            ]);

        $form = $this->getForm($pessoaEndereco, $pessoa);
        $data = $form->submit();
        $pessoaEndereco->sync($data);
        $pessoaEndereco->pessoa()->associate($pessoa);
        PessoaEnderecoService::store($pessoaEndereco);
        return redirect()->route('web.pessoa.edit', ['pessoa' => $pessoaEndereco->pessoa])->with('success', 'Endereço Adicionado.');
    }

    public function edit(Pessoa $pessoa, PessoaEndereco $pessoaEndereco)
    {
        $form = $this->getForm($pessoaEndereco);
        return view('pessoa-endereco.edit', ['form' => $form]);
    }

    public function update(Pessoa $pessoa, PessoaEndereco $pessoaEndereco)
    {
        $form = $this->getForm($pessoaEndereco);
        $data = $form->submit();
        $pessoaEndereco->sync($data);
        $pessoaEndereco->pessoa()->associate($pessoa);
        PessoaEnderecoService::update($pessoaEndereco);

        return redirect()->route('web.pessoa.edit', ['pessoa' => $pessoaEndereco->pessoa])->with('info', 'Endereço alterado.');
    }

    public function destroy(Pessoa $pessoa, PessoaEndereco $pessoaEndereco)
    {
        PessoaEnderecoService::destroy($pessoaEndereco);
        return redirect()->route('web.pessoa.edit', compact('pessoa'))->with('info', 'Endereço removido.');
    }
}
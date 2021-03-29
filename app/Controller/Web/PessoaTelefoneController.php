<?php
/**
 *
 * Data e hora: 2021-01-05 17:04:22
 * Controller/Web gerada automaticamente
 *
 */


namespace App\Controller\Web;


use App\Controller\Controller;
use App\Form\PessoaTelefoneForm;
use App\Model\Entity\Pessoa;
use App\Model\Entity\PessoaTelefone;
use Facades\App\Model\Repository\PessoaTelefoneRepository;
use Facades\App\Model\Service\PessoaTelefoneService;
use Kris\LaravelFormBuilder\Facades\FormBuilder;


class PessoaTelefoneController extends Controller
{

    public function create(Pessoa $pessoa)
    {
        $pessoaTelefone = new PessoaTelefone();
        $pessoaTelefone->pessoa()->associate($pessoa);

        $form = $this->getForm($pessoaTelefone, $pessoaTelefone->pessoa);
        return view('pessoa-telefone.create', ['form' => $form, 'pessoa' => $pessoaTelefone->pessoa]);
    }

    public function getForm(PessoaTelefone $pessoaTelefone, Pessoa $pessoa = null)
    {
        $form = FormBuilder::create(PessoaTelefoneForm::class, [
            'method' => $pessoaTelefone->exists ? 'PUT' : 'POST',
            'url' => $pessoaTelefone->exists ? route('web.pessoa-telefone.update', ['pessoa' => $pessoaTelefone->pessoa, 'pessoa_telefone' => $pessoaTelefone->id]) : route('web.pessoa-telefone.store', ['pessoa' => $pessoa->id]),
            'model' => $pessoaTelefone
        ]);
        $form->validate($pessoaTelefone->getRules(), $pessoaTelefone->getMessages());
        return $form;
    }

    public function store(Pessoa $pessoa, PessoaTelefone $pessoaTelefone)
    {
        if (request()->get('descricao') == null)
            request()->merge([
                'descricao' => $pessoa->telefones->count() <= 0 ? 'Principal' : ('Celular #' . $pessoa->telefones->count()),
            ]);

        $form = $this->getForm($pessoaTelefone, $pessoa);
        $data = $form->submit();

        list($data['ddd'], $data['numero']) = explode(') ', substr($data['telefone'], 1));

        $pessoaTelefone->sync($data);
        $pessoaTelefone->pessoa()->associate($pessoa);
        PessoaTelefoneService::store($pessoaTelefone);
        return redirect()->route('web.pessoa.edit', ['pessoa' => $pessoaTelefone->pessoa])->with('success', 'Telefone Adicionado.');
    }

    public function edit(Pessoa $pessoa, PessoaTelefone $pessoaTelefone)
    {
        $form = $this->getForm($pessoaTelefone);
        return view('pessoa-telefone.edit', compact('form'));
    }

    public function update(Pessoa $pessoa, PessoaTelefone $pessoaTelefone)
    {
        $form = $this->getForm($pessoaTelefone);
        $data = $form->submit();

        list($data['ddd'], $data['numero']) = explode(') ', substr($data['telefone'], 1));

        $pessoaTelefone->sync($data);
        PessoaTelefoneService::update($pessoaTelefone);
        return redirect()->route('web.pessoa.edit', ['pessoa' => $pessoaTelefone->pessoa])->with('info', 'Telefone alterado.');
    }

    public function destroy(Pessoa $pessoa, PessoaTelefone $pessoaTelefone)
    {
        PessoaTelefoneService::destroy($pessoaTelefone);
        return redirect()->route('web.pessoa.edit', compact('pessoa'))->with('info', 'Telefone removido.');
    }

}
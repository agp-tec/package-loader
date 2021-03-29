<?php
/**
 *
 * Data e hora: 2020-09-05 15:34:37
 * Controller/Web gerada automaticamente
 *
 */


namespace App\Controller\Web;


use Agp\Webhook\Model\Entity\Webhook;
use Agp\Webhook\Model\Repository\WebhookRepository;
use App\Controller\Controller;
use App\Form\WebhookForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Kris\LaravelFormBuilder\Form;


class WebhookController extends Controller
{
    public function index()
    {
        return view('webhook.index');
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
        return response()->json(WebhookRepository::datatableData());
    }

    public function create()
    {
        $webhook = new Webhook();
        $form = $this->getForm($webhook);
        return view('webhook.create', ['form' => $form]);
    }

    /**
     * @param Webhook $webhook
     * @return Form
     */
    public function getForm(Webhook $webhook)
    {
        $form = FormBuilder::create(WebhookForm::class, [
            'method' => $webhook->exists ? 'PUT' : 'POST',
            'url' => $webhook->exists ? route('web.webhook.update', ['webhook' => $webhook->id]) : route('web.webhook.store'),
            'model' => $webhook
        ]);
        $form->validate($webhook->getRules(), $webhook->getMessages());
        return $form;
    }

    public function store(Webhook $webhook)
    {
        $form = $this->getForm($webhook);
        $data = $form->submit();
        foreach ($data['webhookEventos'] as $key => $value) {
            if (!$data['webhookEventos'][$key]['evento'])
                unset($data['webhookEventos'][$key]);
        }
        $webhook->sync($data);
        $webhook->save();
        return redirect()->route('web.settings')->with('success', 'Webhook adicionada.');
    }

    public function teste(Webhook $webhook)
    {
        $webhook = (new WebhookRepository)->getById($webhook->getKey());
        if (!$webhook)
            return redirect()->back()->with('error', 'Webhook não encontrado.');
        $data = [
            "events" => ["ev_test_created"],
            "data" => [
                "Message" => "This is a test."
            ]
        ];
        $response = Http::post($webhook->url, $data);
        if (($response->status() < 200) || ($response->status() > 299))
            return redirect()->back()->with('error', 'Falha ao testar webhook: ' . $response->getReasonPhrase() . ' ' . $response->status() . ' ' . $response->body());

        return redirect()->back()->with('success', 'Webhook enviado: ' . $response->status() . ' ' . $response->body());
    }

    public function edit(Webhook $webhook)
    {
        $form = $this->getForm($webhook);
        return view('webhook.edit', ['form' => $form]);
    }

    public function update(Webhook $webhook)
    {
        $form = $this->getForm($webhook);
        $data = $form->submit();
        $data['webhookEventos'] = request()->get('webhookEventos');
        foreach ($data['webhookEventos'] as $key => $value) {
            if (isset($data['webhookEventos'][$key]['id']) && (!$data['webhookEventos'][$key]['evento']))
                unset($data['webhookEventos'][$key]);
        }
        $webhook->sync($data);
        $webhook->save();
        return redirect()->route('web.settings')->with('info', 'Webhook alterada.');
    }

    public function destroy(Webhook $webhook)
    {
        if ($webhook->delete())
            return redirect()->route('web.settings')->with('info', 'Webhook removida.');
        return redirect()->route('web.settings')->with('error', 'Não foi possível remover.');
    }
}


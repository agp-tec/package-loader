// Class definition

var agputils = (function () {

    var renderizaMascaras = function () {
        // currency format
        $(".currency").inputmask({
            // mask: ["9,99","99,99","999,99","9.999,99","99.999,99","999.999,99","9.999999,99"],
            mask: ["9.99", "99.99", "999.99", "9999.99", "99999.99", "999999.99", "9999999.99"],
            keepStatic: true
        });

        // percent format
        $(".percent").inputmask({
            mask: ["9.999", "99.999"],
            keepStatic: true
        });

        // celular com ddd
        $(".celular").inputmask({
            mask: ['(99) 99999-9999'],
            keepStatic: true
        });

        // rg
        $(".rg").inputmask({
            mask: ['99.999.999-9'],
            keepStatic: true
        });

        // cpf
        $(".cpf").inputmask({
            mask: ['999.999.999-99'],
            keepStatic: true
        });

        // cnpj
        $(".cnpj").inputmask({
            mask: ['99.999.999/9999-99'],
            keepStatic: true
        });

        // CEP format
        $(".cep").inputmask({
            mask: ["99999-999"],
            keepStatic: true
        });

        // rg, cpf ou cnpj
        $(".cpfcnpj").inputmask({
            mask: ['999.999.999-99', '99.999.999/9999-99'],
            keepStatic: true
        });

        // rg cpf ou cnpj
        $(".rgcpfcnpj").inputmask({
            mask: ['99.999.999-9', '999.999.999-99', '99.999.999/9999-99'],
            keepStatic: true
        });

        // rg, cpf
        $(".rgcpf").inputmask({
            mask: ['99.999.999-9', '999.999.999-99'],
            keepStatic: true
        });

        //ip address
        $(".ip").inputmask({
            "mask": "999.999.999.999"
        });

        //credit card number
        $(".number-credit-card").inputmask({
            "mask": "9999 9999 9999 9999"
        });

        //credit card number
        $(".valid-credit-card").inputmask({
            "mask": "99/99"
        });

        //email address
        $(".email").inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: false,
            onBeforePaste: function (pastedValue, opts) {
                pastedValue = pastedValue.toLowerCase();
                return pastedValue.replace("mailto:", "");
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                    cardinality: 1,
                    casing: "lower"
                }
            }
        });
    };

    var utils = function () {
        renderizaMascaras();

        $(document).ready(function () {
            //Previde duplo submit em forms
            $(".form-prevent-multsubmit").on('submit', function () {
                $(".button-prevent-multsubmit").attr('disabled', 'true');
            });

            //Evento de troca de mascara de input doc em pessoa
            $(".input-tipo-doc").on('change', function (el) {
                var opt = $(el.target).val();
                if (opt) {
                    if (opt === '1') //Tipo doc CPF
                        $("#doc").inputmask({mask: ['999.999.999-99'], keepStatic: true});

                    else if (opt === '2') //Tipo doc RG
                        $("#doc").inputmask({mask: ['99.999.999-9'], keepStatic: true});

                    else  //Tipo doc PASSAPORTE
                        $("#doc").inputmask("remove");
                }
            }).trigger('change');
        });
    };

    var preparaSelect2 = function () {
        $(".select2-ajax").select2({
            placeholder: "Procure...",
            allowClear: true,
            ajax: {
                url: function () {
                    return this.data('url');
                },
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        'resource-type': 'select2', //Tipo de recurso para montar json de resposta compativel
                        query: {
                            'generalSearch': params.term
                        },
                        per_page: 5,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = data.meta.page || 1;

                    return {
                        results: data.data,
                        pagination: {
                            more: (data.meta.current_page * data.meta.per_page) < data.meta.total
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 3,
            templateResult: function (data) {
                if (data.loading) return 'Procurando...';
                if (data.widget)
                    return data.widget.data;
                return data.text;
            },
            templateSelection: function (data) {
                return data.text;
            }
        });
        $(".select2-tag").select2({
            placeholder: "Adicione...",
            allowClear: false,
            tags: true,
        });
        $(".select2-basic").select2({
            placeholder: "Selecione...",
            allowClear: true,
        });
    };

    return {
        // public functions
        init: function () {
            utils();
            preparaSelect2();
        },

        //Adiciona mascaras em inputs
        mask: function () {
            renderizaMascaras();
        }
    };
})();

// webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
    module.exports = agputils;
}

jQuery(document).ready(function () {
    agputils.init();
});

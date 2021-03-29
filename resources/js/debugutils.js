// Class definition

var debugutils = (function () {

    //o quarto parametro(n4) só será recebido para o segundo digito
    function dig(n1, n2, n3, n4) {

        //as concatenações todas juntas uma vez que são curtas e legíveis
        var nums = n1.split("").concat(n2.split(""), n3.split(""));

        if (n4) { //se for o segundo digito coloca o n4 no sitio certo
            nums[9] = n4;
        }

        var x = 0;

        //o j é também iniciado e incrementado no for para aproveitar a própria sintaxe dele
        //o i tem inicios diferentes consoante é 1º ou 2º digito verificador
        for (var i = (n4 ? 11 : 10), j = 0; i >= 2; i--, j++) {
            x += parseInt(nums[j]) * i;
        }

        var y = x % 11;
        //ternário aqui pois ambos os retornos são simples e continua legivel
        return y < 2 ? 0 : 11 - y;
    }

    function aleatorio() {
        var aleat = Math.floor(Math.random() * 999);
        //o preenchimento dos zeros à esquerda é mais facil com a função padStart da string
        return ("" + aleat).padStart(3, '0');
    }

    function addBotaoAuxiliar(el, c) {
        var btnid_ = Math.floor(Math.random() * 99999);
        var btn_ = '<button id="' + btnid_ + '" class="btn btn-sm ' + c + ' btn-light-danger ml-1" type="button"><i class="fas fa-bug"></i></button>';
        var id_ = Math.floor(Math.random() * 99999);
        var div_ = '<div id="' + id_ + '" class="d-flex"></div>';
        $(el).after(div_);
        div_ = $('#' + id_);
        $(el).detach().appendTo(div_);
        div_.append(btn_);
    }

    var addBotaoGeraCPF = function () {
        $(document).ready(function () {
            var findClass = ".cpf,.cpfcnpj,.cpfdebug";
            var btnClass = 'btn-debug-cpf';
            $(findClass).each(function () {
                addBotaoAuxiliar(this, btnClass);
            });

            $("." + btnClass).on('click', function () {
                var num1 = aleatorio(); //aleatorio já devolve string, logo não precisa de toString
                var num2 = aleatorio();
                var num3 = aleatorio();

                var dig1 = dig(num1, num2, num3); //agora só uma função dig
                var dig2 = dig(num1, num2, num3, dig1); //mesma função dig aqui

                var cpf = num1 + num2 + num3 + dig1 + dig2;
                $(findClass).val(cpf);
            });
        });
    }

    var addBotaoGeraEmail = function () {
        $(document).ready(function () {
            var findClass = ".email,.emaildebug";
            var btnClass = 'btn-debug-email';
            $(findClass).each(function () {
                addBotaoAuxiliar(this, btnClass);
            });

            $("." + btnClass).on('click', function () {
                var hosts = [
                    'gmail.com',
                    'hotmail.com',
                    'agapesolucoes.com.br',
                    'yahoo.com.br',
                    'co.us'
                ];
                var num1 = Math.floor(Math.random() * 4);
                var num2 = Math.floor(Math.random() * 99999);
                var email = num2 + '@' + hosts[num1 % hosts.length];
                $(findClass).val(email);
            });
        });
    }

    var addBotaoGeraTextos = function () {
        $(document).ready(function () {
            var findClass = ".textodebug";
            var btnClass = 'btn-debug-texto';
            $(findClass).each(function () {
                addBotaoAuxiliar(this, btnClass);
            });

            $("." + btnClass).on('click', function () {
                var textos = [
                    'Laranja Pera',
                    'Mamão Papaya',
                    'Chimarrão',
                    'Chuleta de boi',
                    'Loren Ipsun',
                    'Loreal Paris',
                    'Porta Marrom',
                    'Azul Céu Claro',
                    'Girafa Manca do leste da áfrica',
                    'Ovelha careca',
                    'Clipe de papel',
                    'Caderno vermelho de anotações',
                    'Lânico em cápsulas',
                    'Fone de ouvido',
                    'Hamburguer Artesanal de Costela Bovina',
                    'Batata frita com ketchup',
                ];
                // var num1 = Math.floor(Math.random() * textos.length);
                // var texto = textos[num1 % textos.length];
                $(findClass).each(function () {
                    var num1 = Math.floor(Math.random() * textos.length);
                    $(this).val(textos[num1 % textos.length]);
                });
            });
        });
    }

    var addBotaoGeraCartaoCredito = function () {
        $(document).ready(function () {
            var findClass = ".cartaodebug";
            var btnClass = 'btn-debug-cartao';
            $(findClass).each(function () {
                addBotaoAuxiliar(this, btnClass);
            });

            $("." + btnClass).on('click', function () {
                var cartoes = [
                    {
                        'numero': '5555 5555 5555 5557',
                        'titular': 'Mastercard'
                    },
                    {
                        'numero': '4444 4444 4444 4448',
                        'titular': 'Visa'
                    },
                    {
                        'numero': '5573 4311 1250 9388',
                        'titular': 'Transação não permitida'
                    },
                    {
                        'numero': '4534 7344 7624 9504',
                        'titular': 'Cartão com restrição'
                    },
                    {
                        'numero': '4532 1350 0275 9267',
                        'titular': 'Saldo insuficiente'
                    },
                ];
                // var num1 = Math.floor(Math.random() * textos.length);
                // var texto = textos[num1 % textos.length];
                var cartao = cartoes[Math.floor(Math.random() * cartoes.length) % cartoes.length];
                $('.cartaodebug').val(cartao.numero);
                $('.cartaotitdebug').val(cartao.titular);
                $('.cartaovaldebug').val('01/23');
                $('.cartaocvvdebug').val('123');
            });
        });
    }

    return {
        // public functions
        init: function () {
            addBotaoGeraCPF();
            addBotaoGeraEmail();
            addBotaoGeraTextos();
            addBotaoGeraCartaoCredito();
        },
    };
})();

jQuery(document).ready(function () {
    debugutils.init();
});

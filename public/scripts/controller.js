$(document).ready(function(){
    //Variables
    const warning = $(".warning")

//LOGIN
    $("#formLogin").submit(function(e){
        e.preventDefault()
        var form = $(this).serialize()
        $.ajax({
            type: 'POST',
            url: 'core/control/loginCtl.php?op=login',
            data: form,
            dataType: 'text',
            success: function(res){
                if(res == 'ok'){
                    alert('Logado com sucesso')
                    window.location.href = 'index.php?pg='
                }else if(res == 'err-user'){
                    $("p.alert-danger").html("Login inválido.");
                    $("div.error").slideDown(300).delay(2500).slideUp(300);
                    //alert('Opa, erro em login')
                }else if(res == 'err-pass'){
                    $("p.alert-danger").html("Senha inválida.");
                    $("div.error").slideDown(300).delay(2500).slideUp(300);
                    //alert('Opa, erro na senha')
                }else{
                    $("p.alert-danger").html("Algo de errado não está certo...");
                    $("div.error").slideDown(300).delay(2500).slideUp(300);
                    //alert('Parece que houve um erro inesperado...')
                }
            }
        })
    })
    $("#logout").click(function(e){
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: 'core/control/loginCtl.php?op=logout',
            dataType: 'text',
            success:function(res){
                if(res == 'ok'){
                    window.location.href = 'login.html'
                }
            }
        })
    })

//EVERYTHING ELSE

//CADASTRO
    //Controle de visibilidade de formulário
    $("#novoCadastro").click(function(){
        if($("#novoCadastroForm").hasClass('hidden')){
            $("#novoCadastroForm").slideDown(300)
            $("#buscaForm").slideUp(300)
            $("#buscaResultado").slideUp(300)
            $("#novoCadastroForm")[0].reset()
        }
    })
    $("#buscaCadastro").click(function(){
        if($("#buscaForm").hasClass('hidden')){
            $("#buscaForm").slideDown(300)
            $("#novoCadastroForm").slideUp(300)
            $("#buscaResultado").slideUp(300)
        }
    })

    //Novo Cadastro
    $("#novoCadastroForm").submit(function(e){
        e.preventDefault()
        var form = $(this).serialize()
        $.ajax({
            type: 'POST',
            url: 'core/control/recepcaoCtl.php?op=novo',
            data: form,
            dataType: 'text',
            success:function(res){
                if(res == 'err-user'){
                    $("p.alert-danger").html("Algo deu errado");
                    $("div.error").slideDown(300).delay(2500).slideUp(300);
                }else if(res == 'ok'){
                    $("p.alert-success").html("Usuário registrado com sucesso");
                    $("div.success").slideDown(300).delay(2500).slideUp(300);
                    $("#novoCadastroForm")[0].reset();
                }
            }
        })
    })

    //Busca
    $("#buscaForm").submit(function(e){
        e.preventDefault()
        var form = $(this).serialize()
        $.ajax({
            type: 'POST',
            url: 'core/control/recepcaoCtl.php?op=busca',
            data: form,
            dataType: 'json',
            success:function(res){
                //NEW CODE
                //Envia e recebe json, não mais texto. Agora tem como tratar e mostrar
                //mais de um array de resultado de busca.
                //Falta organizar as informações no front-end em uma tabela
                alert(res)
                if(res == 'err-busca'){
                    console.log("Erro"+res)
                }else{
                    for(i = 0; i < res.length; i++){
                        console.log(res[i])
                    }
                }

                //OLD CODE
                //O script recepcaoCtl.php manda uma resposta em echo
                //concatenada com o termo da busca e divididas por um ';'. Aqui
                //a resposta é dividida no ; e o elemento 0 é a resposta do servidor
                //enquanto que o 1 é o termo buscado retornado 
                //var result = res.split(';')
                //alert (result[0] + " " + result[1])
                // if(result[0] == 'err-busca'){
                //     $("p.alert-danger").html("A busca por " +result[1]+ " não retornou nenhum resultado.")
                //     $("div.error").slideDown(300).delay(2500).slideUp(300)
                //     $("#buscaResultado").slideUp(300)
                // }else{
                //     // $("#buscaErro").removeClass('hidden')
                //     // $("#buscaErro").html(result[0])
                //     $("#buscaResultado").slideDown(300)
                //     $("input[name=nome]").val(result[0])
                //     $("input[name=rg]").val(result[1])
                //     $("input[name=cpf]").val(result[2])
                //     $("input[name=nis]").val(result[3])
                //     $("input[name=end]").val(result[4])
                //     $("select[name=setor]").append("<option>"+result[5]+"</option>")
                //     $("input[name=atendimento]").val(result[6])
                // }
            }
        })
    })

//ACOMPANHAMENTO


//GARAGEM
    //Controle de visibilidade de formulário
    $("#novoCarro").click(function(){
        if($("#novoCarroForm").hasClass('hidden')){
            $("#novoCarroForm").slideDown(300)
            $("#novaRotaForm").slideUp(300)
            $("#novoCarroForm")[0].reset()
        }
    })
    $("#novaRota").click(function(){
        if($("#novaRotaForm").hasClass('hidden')){
            $("#novaRotaForm").slideDown(300)
            $("#novoCarroForm").slideUp(300)
        }
    })

    //Novo carro
    $("#novoCarroForm").submit(function(e){
        e.preventDefault()
        var form = $(this).serialize()
        $.ajax({
            type: 'POST',
            url: 'core/control/garagemCtl.php?op=nc',
            data: form,
            dataType: 'text',
            success: function(res){
                if(res == 'ok'){
                    $("p.alert-success").html("Veículo registrado com sucesso.");
                    $("div.success").slideDown(300).delay(2500).slideUp(300);
                    $("#novoCarroForm")[0].reset();
                    //alert ("Veículo salvo na base de dados.")
                }else if(res == 'err-vehicle'){
                    $("p.alert-danger").html("Erro ao salvar veículo");
                    $("div.error").slideDown(300).delay(2500).slideUp(300);
                    //alert("Erro ao salvar veículo")
                }else if(res == 'exists'){
                    $("p.alert-danger").html("Veículo já existe");
                    $("div.error").slideDown(300).delay(2500).slideUp(300);
                    //alert ("Veículo já existe.")
                }else{
                    $("p.alert-danger").html("Algo deu errado...");
                    $("div.error").slideDown(300).delay(2500).slideUp(300);
                    //alert ("Algo deu errado..." + res)
                }
            }
        })
    })

    //Nova Rota
    $("#novaRotaForm").submit(function(e){
        e.preventDefault()
        var form = $(this).serialize()
        $.ajax({
            type: 'POST',
            url: 'core/control/garagemCtl.php?op=nr',
            data: form,
            dataType: 'text',
            success: function(res){
                if(res == 'ok'){
                    $("p.alert-success").html("Rota criada com sucesso");
                    $("div.success").slideDown(300).delay(2500).slideUp(300);
                    $("#novaRotaForm")[0].reset();
                    //alert ("Rota salva na base de dados.")
                }else{
                    $("p.alert-danger").html("Algo deu errado");
                    $("div.error").slideDown(300).delay(2500).slideUp(300);
                    //alert ("Algo deu errado...")
                }
            }
        })
    })
})
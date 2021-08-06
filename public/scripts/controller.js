$(document).ready(function(){

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
                    alert('Opa, erro em login')
                }else if(res == 'err-pass'){
                    alert('Opa, erro na senha')
                }else{
                    alert('Parece que houve um erro inesperado...')
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
            $("#novoCadastroForm").removeClass('hidden')
            $("#buscaForm").addClass('hidden')
            $("#buscaErro").addClass('hidden')
            $("#buscaResultado").addClass('hidden')
            $("#novoCadastroForm")[0].reset()
        }
    })
    $("#buscaCadastro").click(function(){
        if($("#buscaForm").hasClass('hidden')){
            $("#buscaForm").removeClass('hidden')
            $("#novoCadastroForm").addClass('hidden')
            $("#buscaErro").addClass('hidden')
            $("#buscaResultado").addClass('hidden')
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
                    alert("Algo deu errado.")
                }else if(res == 'ok'){
                    alert("Usuário cadastrado com sucesso.")
                    $("#novoCadastroForm")[0].reset()
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
            dataType: 'text',
            success:function(res){
                //O script recepcaoCtl.php manda uma resposta em echo
                //concatenada com o termo da busca e divididas por um '.'. Aqui
                //a resposta é dividida no . e o elemento 0 é a resposta do servidor
                //enquanto que o 1 é o termo buscado retornado 
                var result = res.split(';')
                //alert (result[0] + " " + result[1])
                if(result[0] == 'err-busca'){
                    $("#buscaErro").removeClass('hidden')
                    $("#buscaResultado").addClass('hidden')
                    $("#buscaErro").html("A busca por " +result[1]+ " não retornou nenhum resultado.")
                }else{
                    // $("#buscaErro").removeClass('hidden')
                    // $("#buscaErro").html(result[0])
                    $("#buscaResultado").removeClass('hidden')
                    $("#buscaErro").addClass('hidden')
                    $("input[name=nome]").val(result[0])
                    $("input[name=rg]").val(result[1])
                    $("input[name=cpf]").val(result[2])
                    $("input[name=nis]").val(result[3])
                    $("input[name=end]").val(result[4])
                    $("select[name=setor]").append("<option>"+result[5]+"</option>")
                    $("input[name=atendimento]").val(result[6])
                }
            }
        })
    })

//GARAGEM
    //Controle de visibilidade de formulário
    $("#novoCarro").click(function(){
        if($("#novoCarroForm").hasClass('hidden')){
            $("#novoCarroForm").removeClass('hidden')
            $("#novaRotaForm").addClass('hidden')
        }
    })
    $("#novaRota").click(function(){
        if($("#novaRotaForm").hasClass('hidden')){
            $("#novaRotaForm").removeClass('hidden')
            $("#novoCarroForm").addClass('hidden')
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
                    alert ("Veículo salvo na base de dados.")
                }else if(res == 'err-vehicle'){
                    alert("Erro ao salvar veículo")
                }else if(res == 'exists'){
                    alert ("Veículo já existe.")
                }else{
                    alert ("Algo deu errado..." + res)
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
                    alert ("Rota salva na base de dados.")
                }else{
                    alert ("Algo deu errado...")
                }
            }
        })
    })
})
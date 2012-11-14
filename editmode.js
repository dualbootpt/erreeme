var viewpage = new Object;
viewpage['empresa'] = "erreeme.empresa.php?lang=";
viewpage['coleccao'] = "erreeme.coleccao.php?lang=";
viewpage['novidades'] = "erreeme.novidades.php?lang=";
viewpage['ambientes'] = "erreeme.ambientes.php?lang=";
viewpage['parcerias'] = "erreeme.parcerias.php?lang=";
viewpage['contactos'] = "erreeme.contactos.php?lang=";
viewpage['registo'] = "erreeme.contactos.php?lang=";

var block = new Object;
block['empresa'] = "RIGHTSIDETEXTBLOCK";
block['coleccao'] = "RIGHTSIDETEXTBLOCK";
block['novidades'] = "RIGHTSIDETEXTBLOCK";
block['ambientes'] = "RIGHTSIDETEXTBLOCK";
block['parcerias'] = "TOPBLOCKTEXTBLOCK";
block['contactos'] = "LEFTSIDETEXTBLOCK";
block['registo'] = "REGISTO";

function listSlides(data){
    $('#slideSelector').append('<div>Selecione imagem a Inserir</div>')
    lista=$.parseJSON(data);
    for(i=0;i<lista.length;i++){
        imgTag=$('<img class="imageListItem"/>').attr('src',lista[i]);
        $('#slideSelector').append(imgTag);
    }
    $('#slideSelector').append('<a pageid="novidades" id="closeQualidadeSelector">cancel</a>');
    // Must bind the event at the same time that the element is added.
    // the normal method does not work.    
    $('.imageListItem').bind('click',function(){insertOneSlide($(this).attr('src'))});
    $('#closeQualidadeSelector').bind('click',function(){closeQualidadeSelector()});
}
function listaQualidades(data){
    $('#imageSelector').append('<a pageid="coleccao" id="closeQualidadeSelector">cancel</a>');
    $('#imageSelector').append('<p>Nome da nova Qualidade</p>');
    $('#imageSelector').append('<input id="inputNomeQualidade" type="text" name="qualidade"/>');
    $('#imageSelector').append('<div><br>Selecione imagem a Inserir</div>');
    lista=$.parseJSON(data);
    for(i=0;i<lista.length;i++){
        imgTag=$('<img class="imageQualidades"/>').attr('src',lista[i]);
        $('#imageSelector').append(imgTag);
    }
    // Must bind the event at the same time that the element is added.
    // the normal method does not work. 
    $('.imageQualidades').bind('click',function(){insertQualidade($(this).attr('src'))});
    $('#closeQualidadeSelector').bind('click',function(){closeQualidadeSelector()});
}
function insertOneSlide(src){
    param = new Object;
    record = new Object;
    record.src = src;
    record.pageid = $('#slideSelector').attr("pageid");
    record.groupid = $('#bannerslideshow').attr("bannerslide");
    record.sequence = 100;
    param.record = record;
    param.op = 'insertSlide';
    $.post('erreeme.controller.php',param,function(){
        alert(record.src+'Inserido com sucesso');
        window.location.assign(viewpage[record.pageid]+$(".mainframe").attr('lang')+"&preview=false");
    });
}
function insertQualidade(src){
    if($('#inputQualidade').value == "") {
        alert("Falta preencher o nome da nova Qualidade.");
        return;
    }            
    param = new Object;
    record = new Object;
    record.src = src;
    record.pageid = $('#imageSelector').attr("pageid");
    record.groupid = $('#inputNomeQualidade').val();
    param.record = record;
    param.op = 'insertColeccao';
    $.post('erreeme.controller.php',param,function(){
        alert(record.src+' Inserido com sucesso.');
        window.location.assign(viewpage[record.pageid]+$(".mainframe").attr('lang')+"&preview=false");
    });
    }
function closeQualidadeSelector(){
        pageid = $('#closeQualidadeSelector').parent().attr('pageid');
        window.location.assign(viewpage[pageid]+$(".mainframe").attr('lang')+"&preview=reset");
    }
    
$(document).ready(   
    function(){
    $('#logout').click(
        function(){
            param = new Object;
            param.op = 'logout';
            $.post('erreeme.controller.php',param,function(){
                alert('Logout com sucesso.');
                window.location.assign("erreeme.html");
            });            
        }
    );
    $('#login').click(
        function(){
            param = new Object;
            record = new Object;
            record.user = $('#user').val();
            record.pwd = $('#pwd').val();
            param.op = 'login';
            param.record = record;
            $.post('erreeme.controller.php',param,function(data){
                if(data=="true"){
                    alert('Login com sucesso.');
                    window.location.assign("erreeme.html");
                } else {
                    window.location.assign("login.php");
                }
            });            
        }
    );    
    $('#newpwd').click(
        function(){
            param = new Object;
            record = new Object;
            record.user = $('#user').val();
            record.pwd = $('#pwd').val();
            record.npwd1 = $('#npwd1').val();
            record.npwd2 = $('#npwd2').val();
            param.op = 'newpwd';
            param.record = record;
            if(record.npwd1!=record.npwd2){
                alert('Nova pwd 1 tem que coincidir com nova pwd 2');
                return;
            } else {
                $.post('erreeme.controller.php',param,function(data){
                    if(data=="true"){
                        alert('nova pwd definida com sucesso.');
                        window.location.assign("erreeme.html");
                    } else {
                        window.location.assign("login.php");
                        alert('erro na alteração da pwd.');
                    }
                });
              }
        }
    );        
    $('#insertSlide').click(
        function(){
            pageid = $(this).attr('dir');
            param = {path : 'img/'+pageid};
            $.get('listDir.php',param,function(data){listSlides(data)});
        }
    );
    $('#removeSlide').click(
        function(){
            param = new Object;
            record = new Object;
            record.key = $("#bannerslideshow").attr("key");
            record.pageid = $('#removeSlide').attr("pageid");
            record.groupid = $('#bannerslideshow').attr("bannerslide");
            record.sequence = 100;
            param.record = record;
            param.op = 'removeSlide';
            $.post('erreeme.controller.php',param,function(){
                alert(record.key+'Removido com sucesso');
                window.location.assign(viewpage[record.pageid]+$(".mainframe").attr('lang')+"&preview=false");
                });
        });
    $('.removeColeccaoOpt').click(
        function(){
            param = new Object;
            record = new Object;
            record.key = $(this).attr('key');
            if(record.key != 'edit') {
                record.pageid = $(this).attr("pageid");
                record.groupid = record.pageid;
                param.record = record;
                param.op = 'removeColeccao';
                $.post('erreeme.controller.php',param,function(){
                    alert(record.pageid+'com key: '+record.key+' removido com sucesso');
                    window.location.assign(viewpage[record.pageid]+$(".mainframe").attr('lang')+"&preview=false");            
                });
            }
        });        
    $('#insertColeccao').click(
        function(){
            param = {path : 'img/coleccao'};
            $.get('listDir.php',param,function(data){
                    listaQualidades(data)
                });
        });
    $('.editRightsidetextblock').click(
        function() {
            record = new Object;
            params = new Object;
            record.key = $('#newtext').attr('key');
            record.text = $('#newtext').val();
            record.lang = $(".mainframe").attr('lang');
            record.pageid = $(this).attr('pageid');
            record.blockid = block[record.pageid];
            params.record = record;
            switch($(this).attr('value')){
                case 'preview':
                    params.op = "preview";
                    $.post('erreeme.controller.php',params,function(){
                            window.location.assign(viewpage[record.pageid]+$(".mainframe").attr('lang')+"&preview=true");
                        });              
                break;
                case 'reset':
                    params.op = "reset";
                    $.post('erreeme.controller.php',params,function(data){
                            window.location.assign(viewpage[record.pageid]+$(".mainframe").attr('lang')+"&preview=reset");
                        });              
                break;     
                case 'save':
                    params.op = "save";
                        $.post('erreeme.controller.php',params,function(){
                            window.location.assign(viewpage[record.pageid]+$(".mainframe").attr('lang')+"&preview=save");
                        });              
                break;
                case 'cancel':
                    params.op = "cancel";
                    $.post('erreeme.controller.php',params,function(){
                            window.location.assign(viewpage[record.pageid]+$(".mainframe").attr('lang')+"&preview=cancel");
                        });              
                break;   
                case 'edit':
                    $('.preview').hide();
                    $('.texteditor').show();             
                break;          
            }
        });            
    }
);




<?php
  function httpPostRequest($url,$params) {
    $data = http_build_query($params); // Similar to urlencode()
    $httpOptions = array(
                      "method" => "POST",
                      "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                      "content" => $data
                   );
    $options = array(
                  "http" => $httpOptions
               );
    $ctxStream  = stream_context_create($options);
    $fp = fopen($url,'r',false,$ctxStream); // Contexts allow using fopen & fread on http and other kinds of streams.
    
    //fpassthru($fp); // Reads file until the EOF and ECHOes averything
    
    $response = stream_get_contents($fp); // Reads the stream into a STRING
    fclose($fp);  
    return $response;
  }

  function getDbConfig($dbname) {
    $params = array(
                  "dbname" => $dbname
              );
    //$resultStr = httpPostRequest('http://erreeme.dualboot.pt/dbaccess.php',$params);    $resultStr = httpPostRequest('http://factorinfo.com/erreeme/site/dbaccess.php',$params);
    $credentials = explode(",",$resultStr);
    return array(
                  "url" => "localhost",
                  "username" => "erreeme_erreeme",
                  "pwd" => "&as!lebuPpa9",
                  "dbname" => "erreeme_erreeme"
                 );
  }
  
  function  createdb($mysqli) {     
    try{        
      $mysqli->query("CREATE TABLE IF NOT EXISTS `LANG_MENU` ( `lang` varchar(10) collate utf8_unicode_ci NOT NULL, `menu` varchar(30) collate utf8_unicode_ci NOT NULL, `option` varchar(30) collate utf8_unicode_ci NOT NULL, `text` varchar(30) collate utf8_unicode_ci NOT NULL, PRIMARY KEY  (`lang`,`menu`,`option`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='MANU ITEMS TRANSLATION'");        
      printf("\n<br>Affected rows (CREATE): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }

    try{        
      $mysqli->query("CREATE TABLE IF NOT EXISTS `LANG_CONTENT` ( `lang` varchar(10) collate utf8_unicode_ci NOT NULL, `pageid` varchar(30) collate utf8_unicode_ci NOT NULL, `blockid` varchar(30) collate utf8_unicode_ci NOT NULL, `text` text collate utf8_unicode_ci NOT NULL, PRIMARY KEY (`lang`,`pageid`,`blockid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Translation of the content blocks'");        
      printf("\n<br>Affected rows (CREATE): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }               
    
    try{        
      $mysqli->query("CREATE TABLE IF NOT EXISTS `COLECCOES` ( `id` varchar(15) collate utf8_unicode_ci NOT NULL, `elem` varchar(15) collate utf8_unicode_ci NOT NULL, `sequence` int(11) NOT NULL, `path` varchar(255) collate utf8_unicode_ci NOT NULL, `bannerslideshow` varchar(30) collate utf8_unicode_ci NOT NULL, PRIMARY KEY  (`id`,`elem`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Associa colleccoes com o bannerslideshow respectivo'");        
      printf("\n<br>Affected rows (CREATE): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }          
    
    try{        
      $mysqli->query("CREATE TABLE IF NOT EXISTS `BANNERSLIDESHOW` ( `groupid` varchar(30) collate utf8_unicode_ci NOT NULL, `sequence` int(11) NOT NULL, `path` varchar(255) collate utf8_unicode_ci NOT NULL, KEY `INDEX-groupid-sequence` (`groupid`,`sequence`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");        
      printf("\n<br>Affected rows (CREATE): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }            
  }  
  
  function  insertLangMenu($mysqli) {     
    try{        
      $mysqli->query("INSERT INTO `LANG_MENU` (`lang`, `menu`, `option`, `text`) VALUES ('langpt', 'mainmenu', 'LINGUA', 'IDIOMA'), ('langpt', 'mainmenu', 'EMPRESA', 'EMPRESA'), ('langpt', 'mainmenu', 'COLECCAO', 'COLEC&Ccedil&AtildeO'), ('langpt', 'mainmenu', 'NOVIDADES', 'NOVIDADES'), ('langpt', 'mainmenu', 'AMBIENTES', 'AMBIENTES'), ('langpt', 'mainmenu', 'CONTACTOS', 'CONTACTOS'), ('langpt', 'mainmenu', 'PARCERIAS', 'PARCERIAS'), ('langes', 'mainmenu', 'LINGUA', 'IDIOMA'), ('langes', 'mainmenu', 'EMPRESA', 'EMPRESA'), ('langes', 'mainmenu', 'COLECCAO', 'COLECCION'), ('langes', 'mainmenu', 'NOVIDADES', 'NUEVO'), ('langes', 'mainmenu', 'AMBIENTES', 'AMBIENTES'), ('langes', 'mainmenu', 'CONTACTOS', 'CONTACTOS'), ('langes', 'mainmenu', 'PARCERIAS', 'REPRESENTACIONES'), ('langfr', 'mainmenu', 'LINGUA', 'LANGUES'), ('langfr', 'mainmenu', 'EMPRESA', 'PRODUCION'), ('langfr', 'mainmenu', 'COLECCAO', 'COLLECTION'), ('langfr', 'mainmenu', 'NOVIDADES', 'NOUVEAU'), ('langfr', 'mainmenu', 'AMBIENTES', 'SC&EgraveNES'), ('langfr', 'mainmenu', 'CONTACTOS', 'CONTACTS'), ('langfr', 'mainmenu', 'PARCERIAS', 'REPRESENTACIONS'), ('langde', 'mainmenu', 'LINGUA', 'SPRACHE'), ('langde', 'mainmenu', 'EMPRESA', 'PRODUKTION'), ('langde', 'mainmenu', 'COLECCAO', 'ERFASSUNG'), ('langde', 'mainmenu', 'NOVIDADES', 'NEUE'), ('langde', 'mainmenu', 'AMBIENTES', 'UMGEBUNGEN'), ('langde', 'mainmenu', 'CONTACTOS', 'KONTAKTE'), ('langde', 'mainmenu', 'PARCERIAS', 'PARTNERSCHAFTEN'), ('langit', 'mainmenu', 'LINGUA', 'LINGUA'), ('langit', 'mainmenu', 'EMPRESA', 'BUSINESS'), ('langit', 'mainmenu', 'COLECCAO', 'COLLECTION'), ('langit', 'mainmenu', 'NOVIDADES', 'NEW'), ('langit', 'mainmenu', 'AMBIENTES', 'AMBIENTI'), ('langit', 'mainmenu', 'CONTACTOS', 'CONTATTI'), ('langit', 'mainmenu', 'PARCERIAS', 'PARTENARIATI'), ('langen', 'mainmenu', 'LINGUA', 'LANGUAGE'), ('langen', 'mainmenu', 'EMPRESA', 'BUSINESS'), ('langen', 'mainmenu', 'COLECCAO', 'COLLECTION'), ('langen', 'mainmenu', 'NOVIDADES', 'NEW'), ('langen', 'mainmenu', 'AMBIENTES', 'ENVIRONMENTS'), ('langen', 'mainmenu', 'CONTACTOS', 'CONTACTS'), ('langen', 'mainmenu', 'PARCERIAS', 'PARTNERSHIPS')");        
      printf("\n<br>Affected rows (INSERT LANGMENU): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }  
  }  
  
  function  insertLangContent($mysqli) {     
    try{        
      $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langpt', 'empresa', 'RIGHTSIDETEXTBLOCK', 'Exclusivamente dedicada &agrave cria&ccedil&atildeo, fabrico e comercializa&ccedil&atildeo, nacional e internacional, de tapetes artesanais, a <erreeme>Erreeme Tape&ccedilarias</erreeme> foi criada em 1988. Projetada para clientes exigentes e ambientes exclusivos, a <erreeme>Erreeme Tape&ccedilarias</erreeme> oferece uma gama de tapetes &uacutenicos que conjugam o design inovador e a excelente qualidade,	evidenciando-se a originalidade e a constante actualiza&ccedil&atildeo das tendencias. <p> A <erreeme>Erreeme Tape&ccedilarias</erreeme> afirma-se como uma empresa de ineg&aacutevel dinamismo, criadora de tapetes simultaneamente contempor&acircneos e intemporais, repletos de personalidade e sedu&ccedil&atildeo.	<p> Utilizamos os melhores materiais, como: seda, mohair, linho e l&atilde, para proporcionar o m&aacuteximo de bem-estar e conforto. A nossa produ&ccedil&atildeo obedece a um rigoroso controlo de todo o processo de fabrico e permite executar tapetes com diversas caracter&iacutesticas: <dl> - Diferentes densidades, texturas e <i>design</i> personalizado; <dl> - Tamanhos e formas &aacute medida; <dl> - Cores exclusivas e especiais; <dl> - Prazos de execu&ccedil&atildeo 3 a 4 semanas'), ('langde', 'empresa', 'RIGHTSIDETEXTBLOCK', 'Ausschlie&szliglich f&ucircr die Herstellung von handgefertigten Teppichen gewidmet wurde die <erreeme>Erreeme Tape&ccedilarias</erreeme> Teppiche 1988 gegr&ucircndet. \nDie RM (<erreeme>Erreeme Tape&ccedilarias</erreeme>) bietet f&ucircr anspruchsvolle Kunden und einzigartige Umgebungen eine genauso einzigartige Palette an Teppichen.\nWir verwenden die besten Materialien, wie Seide, Mohair, Leinen und Wolle die ein H&oumlchstma&szlig an Wohlbefinden und Komfort bietten.\n<p>\nUnsere Produktion unterliegt einer strengen Kontrolle w&aumlhrend des gesamten Herstellungsprozesses und hat die F&aumlhigkeit Teppiche mit unterschiedlichen Eigenschaften zu entwickeln, wie z.B:<dl>-Dichten, Texturen und individuelles Design<dl>-Gr&ouml&szligen und Formen<dl>-Exklusive- und Sonderfarben Unser bearbeitungs <dl>- und entwicklungszeit ist etwa 3-4 Wochen.<p>Kommen Sie uns kennen.\n'), ('langen', 'empresa', 'RIGHTSIDETEXTBLOCK', 'Exclusively dedicated to the production of handmade carpets, <erreeme>Erreeme Tape&ccedilarias</erreeme> was established in 1988. Designed for demanding customers and exclusive environments, RM offers a unique range of rugs. We use the best materials, like silk, mohair, linen and wool, to provide maximum well-being and comfort. <p> Our production follows a strict control through the entire manufacturing process and its main advantage is the ability to create rugs with different characteristics: <dl>- Different densities, textures and custom design; <dl>- Adapted sizes and shapes; <dl>- Exclusive and special colors;<dl>- Manufacture takes only 3 to 4 weeks.<p>Come and meet us.\n'), ('langes', 'empresa', 'RIGHTSIDETEXTBLOCK', 'Dedicada exclusivamente a la producci&oacuten de alfombras hechas a mano, <erreeme>Erreeme Tape&ccedilarias</erreeme> se estableci&oacute en 1988. Dise&ntildeado para los clientes m&aacutes exigentes y con entornos &uacutenicos, la RM ofrece una gama &uacutenica de alfombras. Usamos los mejores materiales, como la seda, el mohair, lino y lana, para proporcionar el m&aacuteximo bienestar y confort. <p> Nuestra producci&oacuten sigue un estricto control del proceso de fabricaci&oacuten y su principal ventaja es la capacidad de ejecutar alfombras con diversas caracter&iacutesticas:<dl>- Diferentes densidades,  texturas y dise&ntildeo personalizado;<dl>- Medidas y formas personalizadas;<dl>- Colores especiales y &uacutenicas;<dl>- Plazos de ejecuci&oacuten de 3-4 semanas. <p> Ven a conocernos.\n'), ('langfr', 'empresa', 'RIGHTSIDETEXTBLOCK', 'Exclusivement d&eacutedi&eacutee &agrave la production de tapis artisanaux, la <erreeme>Erreeme Tape&ccedilarias</erreeme> a &eacutet&eacute cr&eacute&eacutee en 1988. Elle a &eacutet&eacute con&ccedilue pour des clients exigeants et pour des ambiances exclusives. La RM offre une gamme de tapis uniques. Nous utilisons les meilleurs mat&eacuteriaux, tels que la soie, le mohair, le lin et la laine, afin de proportionner un maximum de bien-&ecirctre et de confort. <p> Notre production ob&eacuteit &agrave un rigoureux contr&ocircle de tous les processus de fabrication et a comme principal avantage la possibilit&eacute de faire des tapis avec plusieurs caract&eacuteristiques : <dl>-	Densit&eacutes diff&eacuterentes, textures et design personnalis&eacute ;<dl>-	Dimensions et formes sur mesure ;<dl>-	Couleurs exclusives et sp&eacuteciales ;<dl>-	D&eacutelai de fabrication : de 3 &agrave 4 semaines.<p>Venez nous rendre visite.\n'), ('langit', 'empresa', 'RIGHTSIDETEXTBLOCK', 'Exclusively dedicated to the production of handmade carpets, <erreeme>Erreeme Tape&ccedilarias</erreeme> was established in 1988. Designed for demanding customers and exclusive environments, RM offers a unique range of rugs. We use the best materials, like silk, mohair, linen and wool, to provide maximum well-being and comfort. <p> Our production follows a strict control through the entire manufacturing process and its main advantage is the ability to create rugs with different characteristics: <dl>- Different densities, textures and custom design; <dl>- Adapted sizes and shapes; <dl>- Exclusive and special colors;<dl>- Manufacture takes only 3 to 4 weeks.<p>Come and meet us.\n'), ('langpt', 'coleccao', 'RIGHTSIDETEXTBLOCK', 'Os nossos padr&otildees de qualidade, resultam da utiliza&ccedil&atildeo dos melhores materiais como,	seda, mohair, linho e l&atilde, na produ&ccedil&atildeo dos nossos tapetes. O conforto, a inova&ccedil&atildeo e a supera&ccedil&atildeo, s&atildeo fatores decisivos na nossa atua&ccedil&atildeo.\n'), ('langde', 'coleccao', 'RIGHTSIDETEXTBLOCK', 'Mit unsere Qualit&aumltsstandards verwenden wir nur die besten Materialien wie Seide, Mohair, Leinen und Wolle in der Produktion unserer Teppiche. Die Innovation, Komfort und Belastbarkeit sind Schl&uumlsselfaktoren in unserer Arbeit.\n'), ('langen', 'coleccao', 'RIGHTSIDETEXTBLOCK', 'Our quality standards result from the use of the best materials like silk, mohair, linen and wool in the manufacture of our carpets. Comfort, innovation and resilience, are the key factors of our products.\n'), ('langes', 'coleccao', 'RIGHTSIDETEXTBLOCK', 'Nuestro est&agravendar de calidad deriva de la utilizaci&oacuten de los mejores materiales como la seda, el mohair, lino y lana, en la producci&oacuten de nuestras alfombras. La comodidad, la innovaci&oacuten y la capacidad de superaci&oacuten son factores clave en nuestro trabajo.\n'), ('langfr', 'coleccao', 'RIGHTSIDETEXTBLOCK', 'Nos normes de qualit&eacute sont le r&eacutesultat de l''utilisation des meilleurs mat&eacuteriaux, tels que la soie, le mohair, le lin et la laine, dans la production de nos tapis. Le confort, l''innovation et le d&eacutepassement sont les facteurs d&eacutecisifs de notre savoir-faire.\n'), ('langit', 'coleccao', 'RIGHTSIDETEXTBLOCK', 'Our quality standards result from the use of the best materials like silk, mohair, linen and wool in the manufacture of our carpets. Comfort, innovation and resilience, are the key factors of our products.\n'), ('langpt', 'novidades', 'RIGHTSIDETEXTBLOCK', 'Novas qualidades em desenvolvimento para apresentar brevemente\n'), ('langde', 'novidades', 'RIGHTSIDETEXTBLOCK', 'Die Entwicklung neuer Qualit&aumlten kurz vorstellen\n'), ('langen', 'novidades', 'RIGHTSIDETEXTBLOCK', 'Developing new qualities to present briefly\n'), ('langes', 'novidades', 'RIGHTSIDETEXTBLOCK', 'Desarrollo de nuevas cualidades para presentar brevemente\n'), ('langfr', 'novidades', 'RIGHTSIDETEXTBLOCK', 'D&eacuteveloppement de nouvelles qualit&eacutes de pr&eacutesenter bri&egravevement\n'), ('langit', 'novidades', 'RIGHTSIDETEXTBLOCK', 'Developing new qualities to present briefly\n'), ('langpt', 'ambientes', 'RIGHTSIDETEXTBLOCK', 'H&aacute texturas que fazem os ambientes falar por si. Os nossos tapetes s&atildeo exemplo disso.\n'), ('langde', 'ambientes', 'RIGHTSIDETEXTBLOCK', 'Es gibt Texturen, die das Ambiente f&uumlr sich selbst sprechen lassen. UnsereTeppiche sind ein Beispiel davon.\n'), ('langen', 'ambientes', 'RIGHTSIDETEXTBLOCK', 'There are textures that make an environment speak for itself. Our rugs are an example of that.\n'), ('langes', 'ambientes', 'RIGHTSIDETEXTBLOCK', 'Hay texturas que hacen el entorno hablar por s&iacute mismo. Nuestras alfombras son un ejemplo.\n'), ('langfr', 'ambientes', 'RIGHTSIDETEXTBLOCK', 'Il y a des textures qui font les ambiances parler pour vous. Nos tapis sont l''exemple que cela arrive vraiment.\n'), ('langit', 'ambientes', 'RIGHTSIDETEXTBLOCK', 'There are textures that make an environment speak for itself. Our rugs are an example of that.\n'), ('langpt', 'parcerias', 'TOPBLOCKTEXTBLOCK', 'Estamos constantemente &agrave procura de novos parceiros de neg&oacutecio, para continuar a levar aos nossos clientes um servi&ccedilo completo e de qualidade. <p> Se estiver interessado em colaborar connosco, por favor <a href=\'mailto://geral@erreeme.pt\'>contacte-nos</a>.\n'), ('langde', 'parcerias', 'TOPBLOCKTEXTBLOCK', 'Wir sind st&aumlndig auf der Suche nach neuen Gesch&aumlftspartnern um unseren Kunden Qualit&aumlt und einen kompletten Service  weiterhin zu bringen. <p> Wenn Sie an eine Zusammenarbeit interesse sind, bitte <a href=\'mailto://geral@erreeme.pt\'>kontaktieren</a> Sie uns.\n'), ('langen', 'parcerias', 'TOPBLOCKTEXTBLOCK', 'We are constantly looking for new business partners to continue bringing our clients a complete and quality service.<p>If you are interested in cooperating with RM, please <a href=\'mailto://geral@erreeme.pt\'>contact</a> us.\n'), ('langes', 'parcerias', 'TOPBLOCKTEXTBLOCK', 'Estamos constantemente buscando nuevos socios comerciales para seguir ofreciendo a nuestros clientes un servicio completo y de calidad.<p>Si usted est&agrave interesado en cooperar con RM, por favor p&oacutengase en <a href=\'mailto://geral@erreeme.pt\'>contacto</a> con nosotros.\n'), ('langfr', 'parcerias', 'TOPBLOCKTEXTBLOCK', 'Nous sommes constamment &agrave la recherche de nouveaux partenariat d''affaires afin de continuer &agrave offrir &agrave nos clients un service complet et de qualit&eacute.<p>Si vous êtes int&eacuteress&eacute de collaborer avec nous, n''h&eacutesitez pas &agrave prendre <a href=\'mailto://geral@erreeme.pt\'>contact</a> avec nous.\n'), ('langit', 'parcerias', 'TOPBLOCKTEXTBLOCK', 'We are constantly looking for new business partners to continue bringing our clients a complete and quality service.<p>If you are interested in cooperating with RM, please <a href=\'mailto://geral@erreeme.pt\'>contact</a> us.\n'), ('langpt', 'contactos', 'REGISTO', 'Registe-se para receber a nossa newsletter.\n'), ('langde', 'contactos', 'REGISTO', 'Registrieren Sie unseren Newsletter erhalten.\n'), ('langen', 'contactos', 'REGISTO', 'Subscribe our newsletter here.\n'), ('langes', 'contactos', 'REGISTO', 'Subscribe nuestra newsletter.\n'), ('langfr', 'contactos', 'REGISTO', 'Inscrivez-vous pour recevoir notre newsletter.\n'), ('langit', 'contactos', 'REGISTO', 'Subscribe our newsletter here.\n'), ('langpt', 'contactos', 'LEFTSIDETEXTBLOCK', 'Estamos perto de si. Para saber onde nos encontrar por favor envie-nos uma <a href=\'mailto://geral@erreeme.pt\'>mensagem</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n'), ('langde', 'contactos', 'LEFTSIDETEXTBLOCK', 'Wir sind Ihnen nahe. Um zu erfahren wo Sie uns finden <a href=\'mailto://geral@erreeme.pt\'>senden Sie uns bitte eine Nachricht</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n'), ('langen', 'contactos', 'LEFTSIDETEXTBLOCK', 'We are close to you. To find out where we are, please <a href=\'mailto://geral@erreeme.pt\'>send us a message</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n'), ('langes', 'contactos', 'LEFTSIDETEXTBLOCK', 'Estamos cerca de usted. Para saber d&oacutende estamos por favor <a href=\'mailto://geral@erreeme.pt\'>env&igraveenos un mensaje</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n'), ('langfr', 'contactos', 'LEFTSIDETEXTBLOCK', 'Nous sommes pr&egraves de chez vous. Pour savoir o&ugrave nous trouver, <a href=\'mailto://geral@erreeme.pt\'>laissez-nous un message</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n'), ('langit', 'contactos', 'LEFTSIDETEXTBLOCK', 'We are close to you. To find out where we are, please <a href=\'mailto://geral@erreeme.pt\'>send us a message</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n')");        
      printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }        
  }      
  
  function  insertColeccoes($mysqli) {
    try{        
      $mysqli->query("INSERT INTO `COLECCOES` (`id`, `elem`, `sequence`, `path`, `bannerslideshow`) VALUES ('qualidades', 'natura', 10, 'img/coleccao/natura.png', 'QualidadeNatura'), ('qualidades', 'chic', 20, 'img/coleccao/chic.png', 'QualidadeChic'), ('qualidades', 'lin', 30, 'img/coleccao/lin.png', 'QualidadeLin'), ('qualidades', 'velvet', 40, 'img/coleccao/velvet.png', 'QualidadeVelvet'), ('qualidades', 'lucca', 50, 'img/coleccao/lucca.png', 'QualidadeLucca'), ('qualidades', 'strike', 60, 'img/coleccao/strike.png', 'QualidadeStrike'), ('qualidades', 'elite', 80, 'img/coleccao/elite.png', 'QualidadeElite'), ('qualidades', 'mood', 90, 'img/coleccao/mood.png', 'QualidadeMood'), ('qualidades', 'cool', 100, 'img/coleccao/cool.png', 'QualidadeCool'), ('qualidades', 'more', 120, 'img/coleccao/more.png', 'QualidadeMore'), ('qualidades', 'fogl', 130, 'img/coleccao/fogl.png', 'QualidadeFogl'), ('qualidades', 'silklin', 140, 'img/coleccao/silklin.png', 'QualidadeSilklin'), ('novidades', 'trevi', 210, 'img/coleccao/trevi.png', 'QualidadeTrevi'), ('novidades', 'sense', 220, 'img/coleccao/sense.png', 'QualidadeSense'), ('novidades', 'reach', 230, 'img/coleccao/reach.png', 'QualidadeReach')");        
      printf("\n<br>Affected rows (INSERT COLECCOES): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }   
   }       
  
  function  insertBannerslideshow($mysqli) {     
    try{        
      $mysqli->query("INSERT INTO `BANNERSLIDESHOW` (`groupid`, `sequence`, `path`) VALUES ('ambientes', 100, 'img/ambientes/ambientes_1.jpg'), ('ambientes', 110, 'img/ambientes/ambientes_2.jpg'), ('ambientes', 120, 'img/ambientes/ambientes_3.jpg'), ('ambientes', 130, 'img/ambientes/ambientes_4.jpg'), ('ambientes', 140, 'img/ambientes/ambientes_5.jpg'), ('ambientes', 150, 'img/ambientes/ambientes_6.jpg'), ('ambientes', 160, 'img/ambientes/ambientes_7.jpg'), ('QualidadeNatura', 210, 'img/coleccao/Natura_Compo_72.jpg'), ('QualidadeChic', 310, 'img/coleccao/Chic_compo_72.jpg'), ('QualidadeLin', 410, 'img/coleccao/Lin_compo_72.jpg'), ('QualidadeVelvet', 510, 'img/coleccao/Velvet_Compo_72.jpg'), ('QualidadeLucca', 610, 'img/coleccao/Lucca_Compo_72.jpg'), ('QualidadeStrike', 710, 'img/coleccao/Strike II_72.jpg'), ('QualidadeElite', 810, 'img/coleccao/Elite_72.jpg'), ('QualidadeMood', 910, 'img/coleccao/Mood mix_compo_72.jpg'), ('QualidadeCool', 1010, 'img/coleccao/Cool_72.jpg'), ('ambientes', 100, 'img/ambientes/ambientes_8.jpg'), ('QualidadeMore', 1030, 'img/coleccao/More 45.jpg'), ('QualidadeNewMore', 1040, 'img/coleccao/More 45.jpg')");        
      printf("\n<br>Affected rows (INSERT BANNERSLIDESHOW): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }            
  }    
  
  function  truncateBannerslideshow($mysqli) {     
    try{        
      $mysqli->query("TRUNCATE TABLE `BANNERSLIDESHOW`");        
      printf("\n<br>Affected rows (TRUNCATE): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }            
  }      
  
  function  truncateColeccoes($mysqli) {     
    try{        
      $mysqli->query("TRUNCATE TABLE `COLECCOES`");        
      printf("\n<br>Affected rows (TRUNCATE): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }            
  }      
  
  function  truncateLangMenu($mysqli) {     
    try{        
      $mysqli->query("TRUNCATE TABLE `LANG_MENU`");        
      printf("\n<br>Affected rows (TRUNCATE): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }            
  }      
  
  function  truncateLangContent($mysqli) {     
    try{        
      $mysqli->query("TRUNCATE TABLE `LANG_CONTENT`");        
      printf("\n<br>Affected rows (TRUNCATE): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }            
  }      
  
  $dbConfig = getDbConfig("erreeme");
  //var_dump($dbConfig);
  
  $mysqli = new mysqli($dbConfig["url"],$dbConfig["username"],$dbConfig["pwd"],$dbConfig["dbname"]);
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	} else {
      echo "Successfuly connected to db: " . $dbConfig["url"] . "::" . $dbConfig["dbname"];            
      
      //truncateLangMenu($mysqli);
      truncateLangContent($mysqli);
      
      //truncateColeccoes($mysqli);
      //truncateBannerslideshow($mysqli);
   
      //createdb($mysqli);
      
      //insertLangMenu($mysqli);
      insertLangContent($mysqli);
      
      //insertColeccoes($mysqli);
      //insertBannerslideshow($mysqli);
      
	}
?>
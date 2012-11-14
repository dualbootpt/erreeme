<?php
  require_once("dbconfig.php");

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

  function  insertLangMenu($mysqli) {     
    try{        
      $mysqli->query("INSERT INTO `LANG_MENU` (`lang`, `menu`, `option`, `text`) VALUES ('langpt', 'mainmenu', 'LINGUA', 'IDIOMA'), ('langpt', 'mainmenu', 'EMPRESA', 'EMPRESA'), ('langpt', 'mainmenu', 'COLECCAO', 'COLEC&Ccedil&AtildeO'), ('langpt', 'mainmenu', 'NOVIDADES', 'NOVIDADES'), ('langpt', 'mainmenu', 'AMBIENTES', 'AMBIENTES'), ('langpt', 'mainmenu', 'CONTACTOS', 'CONTACTOS'), ('langpt', 'mainmenu', 'PARCERIAS', 'PARCERIAS'), ('langes', 'mainmenu', 'LINGUA', 'IDIOMA'), ('langes', 'mainmenu', 'EMPRESA', 'EMPRESA'), ('langes', 'mainmenu', 'COLECCAO', 'COLECCION'), ('langes', 'mainmenu', 'NOVIDADES', 'NUEVO'), ('langes', 'mainmenu', 'AMBIENTES', 'AMBIENTES'), ('langes', 'mainmenu', 'CONTACTOS', 'CONTACTOS'), ('langes', 'mainmenu', 'PARCERIAS', 'REPRESENTACIONES'), ('langfr', 'mainmenu', 'LINGUA', 'LANGUES'), ('langfr', 'mainmenu', 'EMPRESA', 'PRODUCION'), ('langfr', 'mainmenu', 'COLECCAO', 'COLLECTION'), ('langfr', 'mainmenu', 'NOVIDADES', 'NOUVEAU'), ('langfr', 'mainmenu', 'AMBIENTES', 'SC&EgraveNES'), ('langfr', 'mainmenu', 'CONTACTOS', 'CONTACTS'), ('langfr', 'mainmenu', 'PARCERIAS', 'REPRESENTACIONS'), ('langde', 'mainmenu', 'LINGUA', 'SPRACHE'), ('langde', 'mainmenu', 'EMPRESA', 'PRODUKTION'), ('langde', 'mainmenu', 'COLECCAO', 'ERFASSUNG'), ('langde', 'mainmenu', 'NOVIDADES', 'NEUE'), ('langde', 'mainmenu', 'AMBIENTES', 'UMGEBUNGEN'), ('langde', 'mainmenu', 'CONTACTOS', 'KONTAKTE'), ('langde', 'mainmenu', 'PARCERIAS', 'PARTNERSCHAFTEN'), ('langit', 'mainmenu', 'LINGUA', 'LINGUA'), ('langit', 'mainmenu', 'EMPRESA', 'L\'AZIENDA'), ('langit', 'mainmenu', 'COLECCAO', 'COLLEZIONE '), ('langit', 'mainmenu', 'NOVIDADES', 'NOVIT&Agrave'), ('langit', 'mainmenu', 'AMBIENTES', 'AMBIENTI'), ('langit', 'mainmenu', 'CONTACTOS', 'CONTATTI'), ('langit', 'mainmenu', 'PARCERIAS', 'COLLABORAZIONI'), ('langen', 'mainmenu', 'LINGUA', 'LANGUAGE'), ('langen', 'mainmenu', 'EMPRESA', 'BUSINESS'), ('langen', 'mainmenu', 'COLECCAO', 'COLLECTION'), ('langen', 'mainmenu', 'NOVIDADES', 'NEW'), ('langen', 'mainmenu', 'AMBIENTES', 'ENVIRONMENTS'), ('langen', 'mainmenu', 'CONTACTOS', 'CONTACTS'), ('langen', 'mainmenu', 'PARCERIAS', 'PARTNERSHIPS')");        
      printf("\n<br>Affected rows (INSERT LANGMENU): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }  
  }  
  
  function  insertLangContent($mysqli) {     
    try{
      $text=base64_encode('Exclusivamente dedicada &agrave cria&ccedil&atildeo, fabrico e comercializa&ccedil&atildeo, nacional e internacional, de tapetes artesanais, a <erreeme>Erreeme Tape&ccedilarias</erreeme> foi criada em 1988. Projetada para clientes exigentes e ambientes exclusivos, a <erreeme>Erreeme Tape&ccedilarias</erreeme> oferece uma gama de tapetes &uacutenicos que conjugam o design inovador e a excelente qualidade,	evidenciando-se a originalidade e a constante actualiza&ccedil&atildeo das tendencias. <p> A <erreeme>Erreeme Tape&ccedilarias</erreeme> afirma-se como uma empresa de ineg&aacutevel dinamismo, criadora de tapetes simultaneamente contempor&acircneos e intemporais, repletos de personalidade e sedu&ccedil&atildeo.	<p> Utilizamos os melhores materiais, como: seda, mohair, linho e l&atilde, para proporcionar o m&aacuteximo de bem-estar e conforto. A nossa produ&ccedil&atildeo obedece a um rigoroso controlo de todo o processo de fabrico e permite executar tapetes com diversas caracter&iacutesticas: <dl> - Diferentes densidades, texturas e <i>design</i> personalizado; <dl> - Tamanhos e formas &aacute medida; <dl> - Cores exclusivas e especiais; <dl> - Prazos de execu&ccedil&atildeo 3 a 4 semanas');
      $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langpt', 'empresa', 'RIGHTSIDETEXTBLOCK', '$text')");
      printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
      $text=base64_encode('Ausschlie&szliglich f&ucircr die Herstellung von handgefertigten Teppichen gewidmet wurde die <erreeme>Erreeme Tape&ccedilarias</erreeme> Teppiche 1988 gegr&ucircndet. \nDie RM (<erreeme>Erreeme Tape&ccedilarias</erreeme>) bietet f&ucircr anspruchsvolle Kunden und einzigartige Umgebungen eine genauso einzigartige Palette an Teppichen.\nWir verwenden die besten Materialien, wie Seide, Mohair, Leinen und Wolle die ein H&oumlchstma&szlig an Wohlbefinden und Komfort bietten.\n<p>\nUnsere Produktion unterliegt einer strengen Kontrolle w&aumlhrend des gesamten Herstellungsprozesses und hat die F&aumlhigkeit Teppiche mit unterschiedlichen Eigenschaften zu entwickeln, wie z.B:<dl>-Dichten, Texturen und individuelles Design<dl>-Gr&ouml&szligen und Formen<dl>-Exklusive- und Sonderfarben Unser bearbeitungs <dl>- und entwicklungszeit ist etwa 3-4 Wochen.<p>Kommen Sie uns kennen.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langde', 'empresa', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);    
       $text=base64_encode('Exclusively dedicated to the production of handmade carpets, <erreeme>Erreeme Tape&ccedilarias</erreeme> was established in 1988. Designed for demanding customers and exclusive environments, RM offers a unique range of rugs. We use the best materials, like silk, mohair, linen and wool, to provide maximum well-being and comfort. <p> Our production follows a strict control through the entire manufacturing process and its main advantage is the ability to create rugs with different characteristics: <dl>- Different densities, textures and custom design; <dl>- Adapted sizes and shapes; <dl>- Exclusive and special colors;<dl>- Manufacture takes only 3 to 4 weeks.<p>Come and meet us.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langen', 'empresa', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Dedicada exclusivamente a la producci&oacuten de alfombras hechas a mano, <erreeme>Erreeme Tape&ccedilarias</erreeme> se estableci&oacute en 1988. Dise&ntildeado para los clientes m&aacutes exigentes y con entornos &uacutenicos, la RM ofrece una gama &uacutenica de alfombras. Usamos los mejores materiales, como la seda, el mohair, lino y lana, para proporcionar el m&aacuteximo bienestar y confort. <p> Nuestra producci&oacuten sigue un estricto control del proceso de fabricaci&oacuten y su principal ventaja es la capacidad de ejecutar alfombras con diversas caracter&iacutesticas:<dl>- Diferentes densidades,  texturas y dise&ntildeo personalizado;<dl>- Medidas y formas personalizadas;<dl>- Colores especiales y &uacutenicas;<dl>- Plazos de ejecuci&oacuten de 3-4 semanas. <p> Ven a conocernos.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langes', 'empresa', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);   
       $text=base64_encode('Exclusivement d&eacutedi&eacutee &agrave la production de tapis artisanaux, la <erreeme>Erreeme Tape&ccedilarias</erreeme> a &eacutet&eacute cr&eacute&eacutee en 1988. Elle a &eacutet&eacute con&ccedilue pour des clients exigeants et pour des ambiances exclusives. La RM offre une gamme de tapis uniques. Nous utilisons les meilleurs mat&eacuteriaux, tels que la soie, le mohair, le lin et la laine, afin de proportionner un maximum de bien-&ecirctre et de confort. <p> Notre production ob&eacuteit &agrave un rigoureux contr&ocircle de tous les processus de fabrication et a comme principal avantage la possibilit&eacute de faire des tapis avec plusieurs caract&eacuteristiques : <dl>-	Densit&eacutes diff&eacuterentes, textures et design personnalis&eacute ;<dl>-	Dimensions et formes sur mesure ;<dl>-	Couleurs exclusives et sp&eacuteciales ;<dl>-	D&eacutelai de fabrication : de 3 &agrave 4 semaines.<p>Venez nous rendre visite.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langfr', 'empresa', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);    
       $text=base64_encode('Dedicata esclusivamente alla creazione, fabbricazione e commercializzazione, nazionale ed internazionale, di tappeti artigianali, la <erreeme>Erreme Tapezzerie</erreeme> &egrave stata creata nel 1998. Pensata per clienti esigenti e ambienti esclusivi, la  <erreeme>Erreme Tapezzerie</erreeme> offre una gamma di tappeti unici che coniugano il design innovatore con un\'eccelente qualit&agrave, evidenziando l\'originalit&agrave e la costante attualizzazione delle tendenze.<p>La <erreeme>Erreme Tapezzerie</erreeme> &egrave un\'azienda caratterizzata da dinamismo, creatrice di tappeti che sono allo stesso tempo contemporanei e atemporali, pieni di personalit&agrave e seduzione.<p>Utilizziamo i migliori materiali come: seta, mohair, lino e lana per assicurare il massimo del conforto e benessere. La nostra produzione rispetta un rigoroso controllo su tutto il processo di fabbricazione e permette l\'esecuzione di tappeti dalle caratteristiche pi&ugrave diverse. <dl>- Differente densit&agrave, testura e design personalizzato; <dl>- Grandezze e forme su misura;<dl>- Colori esclusivi e speciali; <dl>- Tempi di produzione da 3 a 4 settimane; \n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langit', 'empresa', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);  
       $text=base64_encode('Os nossos padr&otildees de qualidade, resultam da utiliza&ccedil&atildeo dos melhores materiais como,	seda, mohair, linho e l&atilde, na produ&ccedil&atildeo dos nossos tapetes. O conforto, a inova&ccedil&atildeo e a supera&ccedil&atildeo, s&atildeo fatores decisivos na nossa atua&ccedil&atildeo.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langpt', 'coleccao', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Mit unsere Qualit&aumltsstandards verwenden wir nur die besten Materialien wie Seide, Mohair, Leinen und Wolle in der Produktion unserer Teppiche. Die Innovation, Komfort und Belastbarkeit sind Schl&uumlsselfaktoren in unserer Arbeit.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langde', 'coleccao', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Our quality standards result from the use of the best materials like silk, mohair, linen and wool in the manufacture of our carpets. Comfort, innovation and resilience, are the key factors of our products.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langen', 'coleccao', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Nuestro est&agravendar de calidad deriva de la utilizaci&oacuten de los mejores materiales como la seda, el mohair, lino y lana, en la producci&oacuten de nuestras alfombras. La comodidad, la innovaci&oacuten y la capacidad de superaci&oacuten son factores clave en nuestro trabajo.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langes', 'coleccao', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode( "Nos normes de qualit&eacute sont le r&eacutesultat de l''utilisation des meilleurs mat&eacuteriaux, tels que la soie, le mohair, le lin et la laine, dans la production de nos tapis. Le confort, l''innovation et le d&eacutepassement sont les facteurs d&eacutecisifs de notre savoir-faire.\n");
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langfr', 'coleccao', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode( 'I nostri standard di qualit&agrave sono il risultato dell\'utilizzazione dei migliori materiali come seta, mohair, lino e lana nella produzione dei nostri tappeti. Il conforto, l\'innovazione e l\'ottimizzazione, sono fattori decisivi nella nostra produzione.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langit', 'coleccao', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode( 'Novas qualidades em desenvolvimento para apresentar brevemente\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langpt', 'novidades', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode( 'Die Entwicklung neuer Qualit&aumlten kurz vorstellen\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langde', 'novidades', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Developing new qualities to present briefly\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langen', 'novidades', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Desarrollo de nuevas cualidades para presentar brevemente\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langes', 'novidades', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('D&eacuteveloppement de nouvelles qualit&eacutes de pr&eacutesenter bri&egravevement\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langfr', 'novidades', 'RIGHTSIDETEXTBLOCK',  '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Nuove qualit&agrave in preparazione, le presenteremo in breve\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langit', 'novidades', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('H&aacute texturas que fazem os ambientes falar por si. Os nossos tapetes s&atildeo exemplo disso.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langpt', 'ambientes', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Es gibt Texturen, die das Ambiente f&uumlr sich selbst sprechen lassen. UnsereTeppiche sind ein Beispiel davon.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langde', 'ambientes', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('There are textures that make an environment speak for itself. Our rugs are an example of that.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langen', 'ambientes', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Hay texturas que hacen el entorno hablar por s&iacute mismo. Nuestras alfombras son un ejemplo.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langes', 'ambientes', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Esistono testure che parlano da s&eacute. I nostri tappeti ne sono un esempio.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langit', 'ambientes', 'RIGHTSIDETEXTBLOCK',  '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode("Il y a des textures qui font les ambiances parler pour vous. Nos tapis sont l'exemple que cela arrive vraiment.");
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langfr', 'ambientes', 'RIGHTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows); 
       $text=base64_encode('Estamos constantemente &agrave procura de novos parceiros de neg&oacutecio, para continuar a levar aos nossos clientes um servi&ccedilo completo e de qualidade. <p> Se estiver interessado em colaborar connosco, por favor <a href=\'mailto://geral@erreeme.pt\'>contacte-nos</a>.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langpt', 'parcerias', 'TOPBLOCKTEXTBLOCK',  '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Wir sind st&aumlndig auf der Suche nach neuen Gesch&aumlftspartnern um unseren Kunden Qualit&aumlt und einen kompletten Service  weiterhin zu bringen. <p> Wenn Sie an eine Zusammenarbeit interesse sind, bitte <a href=\'mailto://geral@erreeme.pt\'>kontaktieren</a> Sie uns.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langde', 'parcerias', 'TOPBLOCKTEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('We are constantly looking for new business partners to continue bringing our clients a complete and quality service.<p>If you are interested in cooperating with RM, please <a href=\'mailto://geral@erreeme.pt\'>contact</a> us.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langen', 'parcerias', 'TOPBLOCKTEXTBLOCK',  '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Estamos constantemente buscando nuevos socios comerciales para seguir ofreciendo a nuestros clientes un servicio completo y de calidad.<p>Si usted est&agrave interesado en cooperar con RM, por favor p&oacutengase en <a href=\'mailto://geral@erreeme.pt\'>contacto</a> con nosotros.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langes', 'parcerias', 'TOPBLOCKTEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode("Nous sommes constamment &agrave la recherche de nouveaux partenariat d''affaires afin de continuer &agrave offrir &agrave nos clients un service complet et de qualit&eacute.<p>Si vous êtes int&eacuteress&eacute de collaborer avec nous, n''h&eacutesitez pas &agrave prendre <a href=\'mailto://geral@erreeme.pt\'>contact</a> avec nous.\n");
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langfr', 'parcerias', 'TOPBLOCKTEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Siamo costantemente alla ricerca di nuovi collaboratori commerciali per continuare ad offrire ai nostri clienti un servizio completo e di qualit&agrave.<p>Se &egrave interessato a collaborare con noi, per favore <a href=\'mailto://geral@erreeme.pt\'>ci contatti</a>.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langit', 'parcerias', 'TOPBLOCKTEXTBLOCK',  '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Registe-se para receber a nossa newsletter.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langpt', 'contactos', 'REGISTO', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Registrieren Sie unseren Newsletter erhalten.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langde', 'contactos', 'REGISTO', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Subscribe our newsletter here.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langen', 'contactos', 'REGISTO', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Subscribe nuestra newsletter.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langes', 'contactos', 'REGISTO', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Inscrivez-vous pour recevoir notre newsletter.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langfr', 'contactos', 'REGISTO', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Si registri per ricevere la nostra newsletter.\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langit', 'contactos', 'REGISTO', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Estamos perto de si. Para saber onde nos encontrar por favor envie-nos uma <a href=\'mailto://geral@erreeme.pt\'>mensagem</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langpt', 'contactos', 'LEFTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Wir sind Ihnen nahe. Um zu erfahren wo Sie uns finden <a href=\'mailto://geral@erreeme.pt\'>senden Sie uns bitte eine Nachricht</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langde', 'contactos', 'LEFTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('We are close to you. To find out where we are, please <a href=\'mailto://geral@erreeme.pt\'>send us a message</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langen', 'contactos', 'LEFTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Estamos cerca de usted. Para saber d&oacutende estamos por favor <a href=\'mailto://geral@erreeme.pt\'>env&igraveenos un mensaje</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langes', 'contactos', 'LEFTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Nous sommes pr&egraves de chez vous. Pour savoir o&ugrave nous trouver, <a href=\'mailto://geral@erreeme.pt\'>laissez-nous un message</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langfr', 'contactos', 'LEFTSIDETEXTBLOCK', '$text')");
       printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
       $text=base64_encode('Siamo molto vicini. Per sapere dove incontrarci, per favore ci mandi un  <a href=\'mailto://geral@erreeme.pt\'>messaggio</a>. <p> Email: <a href=\'mailto://geral@erreeme.pt\'>geral@erreeme.pt</a> <p> Rua Sargento Silva, 255<p>4410-103 S&atildeo F&eacutelix da Marinha   <p> Telefone: +351 227 346 495 <p> Fax: +351 227 346 470	<p> GPS: 41 1 6.91 N 8 38 15.15 O\n');
       $mysqli->query("INSERT INTO `LANG_CONTENT` (`lang`, `pageid`, `blockid`, `text`) VALUES ('langit', 'contactos', 'LEFTSIDETEXTBLOCK', '$text')");        
      printf("\n<br>Affected rows (INSERT LANGCONTENT): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }        
  }      
  
  function  insertColeccoes($mysqli) {
    try{        
      $mysqli->query("INSERT INTO `COLECCOES` (`id`, `elem`, `sequence`, `path`, `bannerslideshow`) VALUES ('qualidades', 'natura', 10, 'img/coleccao/natura.png', 'QualidadeNatura'), ('coleccao', 'chic', 20, 'img/coleccao/chic.png', 'QualidadeChic'), ('coleccao', 'lin', 30, 'img/coleccao/lin.png', 'QualidadeLin'), ('coleccao', 'velvet', 40, 'img/coleccao/velvet.png', 'QualidadeVelvet'), ('coleccao', 'lucca', 50, 'img/coleccao/lucca.png', 'QualidadeLucca'), ('coleccao', 'strike', 60, 'img/coleccao/strike.png', 'QualidadeStrike'), ('coleccao', 'elite', 80, 'img/coleccao/elite.png', 'QualidadeElite'), ('coleccao', 'mood', 90, 'img/coleccao/mood.png', 'QualidadeMood'), ('coleccao', 'cool', 100, 'img/coleccao/cool.png', 'QualidadeCool'), ('coleccao', 'more', 120, 'img/coleccao/more.png', 'QualidadeMore'), ('coleccao', 'fogl', 130, 'img/coleccao/fogl.png', 'QualidadeFogl'), ('coleccao', 'silklin', 140, 'img/coleccao/silklin.png', 'QualidadeSilklin'), ('novidades', 'trevi', 210, 'img/coleccao/trevi.png', 'QualidadeTrevi'), ('novidades', 'sense', 220, 'img/coleccao/sense.png', 'QualidadeSense'), ('novidades', 'reach', 230, 'img/coleccao/reach.png', 'QualidadeReach')");        
      printf("\n<br>Affected rows (INSERT COLECCOES): %d", $mysqli->affected_rows);     
    } catch(Exception $e){            
      echo "\n<br>Exceção: ",  $e->getMessage(), "\n<br>";     
    }   
   }       
  
  function  insertBannerslideshow($mysqli) {     
    try{        
      $mysqli->query("INSERT INTO `BANNERSLIDESHOW` (`groupid`, `sequence`, `path`) VALUES ('ambientes', 100, 'img/ambientes/ambientes_1.jpg'), ('ambientes', 110, 'img/ambientes/ambientes_2.jpg'), ('ambientes', 120, 'img/ambientes/ambientes_3.jpg'), ('ambientes', 130, 'img/ambientes/ambientes_4.jpg'), ('ambientes', 140, 'img/ambientes/ambientes_5.jpg'), ('ambientes', 150, 'img/ambientes/ambientes_6.jpg'), ('ambientes', 160, 'img/ambientes/ambientes_7.jpg'), ('QualidadeNatura', 210, 'img/qualidades/Natura_Compo_72.jpg'), ('QualidadeChic', 310, 'img/qualidades/Chic_compo_72.jpg'), ('QualidadeLin', 410, 'img/qualidades/Lin_compo_72.jpg'), ('QualidadeVelvet', 510, 'img/qualidades/Velvet_Compo_72.jpg'), ('QualidadeLucca', 610, 'img/qualidades/Lucca_Compo_72.jpg'), ('QualidadeStrike', 710, 'img/qualidades/Strike II_72.jpg'), ('QualidadeElite', 810, 'img/qualidades/Elite_72.jpg'), ('QualidadeMood', 910, 'img/qualidades/Mood mix_compo_72.jpg'), ('QualidadeCool', 1010, 'img/qualidades/Cool_72.jpg'), ('ambientes', 100, 'img/ambientes/ambientes_8.jpg'), ('QualidadeMore', 1030, 'img/qualidades/More 45.jpg'), ('QualidadeNewMore', 1040, 'img/qualidades/More 45.jpg')");        
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
      
      truncateLangMenu($mysqli);
      truncateLangContent($mysqli);
      
      truncateColeccoes($mysqli);
      truncateBannerslideshow($mysqli);

      insertLangMenu($mysqli);
      insertLangContent($mysqli);
      
      insertColeccoes($mysqli);
      insertBannerslideshow($mysqli);
      
	}
?>
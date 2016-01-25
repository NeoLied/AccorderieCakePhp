<div id="contact" class="container-fluid">

    <h1>Nous Contacter</h1>
    <p> <?php

            $myText = "Pour plus d'informations vous pouvez nous contacter à cette adresse : info@example.com";
            echo $this->Text->autoLinkEmails($myText);
        ?> </p>

</div>
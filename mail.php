<?php
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$service=htmlspecialchars($_POST['service']);
$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$sujet="Selection du service $service";
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    $body="Bonjour $prenom $nom.\n Merci d'avoir contacter Webprint Sénégal.\n Vous avez selectionné le service suivant: $service. Nos équipes vous contacterons pour un discussion plus complete";
    if(mail($email,$sujet,$body)){
        header('Location:Webprint.html?soumis=1');
    }else{
        header('Location:Webprint.html?soumis=0');
    }
}else{
    header('Location:Webprint.html?emailfaux=0');
}
?>
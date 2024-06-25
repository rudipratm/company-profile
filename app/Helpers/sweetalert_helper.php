<?php

function store_sweetalert($icon, $title, $text){
    $session = session();
    return $session->setFlashdata('alert', ['icon' => $icon, 'title' => $title, 'text' => $text]);
}

function show_sweetalert(){
    $session = session();
    if($session->getFlashdata('alert')){
        echo '
        <script>
            Swal.fire({
                icon: "'.$session->getFlashdata('alert')['icon'].'",
                title: "'.$session->getFlashdata('alert')['title'].'",
                html: "'.$session->getFlashdata('alert')['text'].'",
                confirmButtonText: "OK"
            });
        </script>
        ';
    }
}

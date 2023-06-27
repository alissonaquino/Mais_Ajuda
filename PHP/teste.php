<?php

require_once 'Conexao.php';

$qtdcandidatos = 1;

// Método para retornar um usuário
function get_user() {

    $db = new database();

    // Lógica para obter os dados do usuário com o ID fornecido
    $vetor = $db->selectDB("SELECT COUNT(`situacao_pes`) AS qtd_candidatos FROM `pessoa` WHERE `situacao_pes` = 'C'");
    
    foreach ($vetor as $row) {
    $qtdcandidatos = $row->qtd_candidatos; 
    }

    $vetor = $db->selectDB("SELECT COUNT(`situacao_pes`) AS qtd_ajudantes FROM `pessoa` WHERE `situacao_pes` = 'A'");
    
    foreach ($vetor as $row) {
    $qtdajudantes = $row->qtd_ajudantes; 
    }

    $vetor = $db->selectDB("SELECT COUNT(`situacao_pes`) AS qtd_ajudados FROM `pessoa` WHERE `situacao_pes` = 'Ajudado'");
    
    foreach ($vetor as $row) {
    $qtdajudados = $row->qtd_ajudados; 
    }

    // Aqui, retornamos um exemplo com dados fixos
    $array = array(
        'qtdCandidatos' => $qtdcandidatos,
        'qtdajudantes' => $qtdajudantes,
        'qtdajudados' => $qtdajudados
    );
    return json_encode($array);
}



// $action = $_POST['action'];

get_user();

// switch ($action) {
//     case 'get_user':
//         $id = $_POST['id'];
//         echo get_user($id);
//         break;
//     case 'update_user':
//         $id = $_POST['id'];
//         $name = $_POST['name'];
//         $email = $_POST['email'];
//         echo update_user($id, $name, $email);
//         break;
//     case 'create_user':
//         $name = $_POST['name'];
//         $email = $_POST['email'];
//         echo create_user($name, $email);
//         break;
// }

?>

<script>
    var qtdcandidatos = <?php echo $qtdcandidatos; ?>
    console.log(qtdcandidatos)

</script>
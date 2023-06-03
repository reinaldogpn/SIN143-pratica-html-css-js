<?php
// Classe para manipular os registros da tabela users
class User {
    private $db;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'aula08';
        $username = 'root';
        $password = 'root';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch(PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertUser($name, $email) {
        $query = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    public function updateUser($id, $name, $email) {
        $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

// Classe para manipular os registros da tabela games
class Game {
    private $db;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'aula08';
        $username = 'root';
        $password = 'root';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch(PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function getAllGames() {
        $query = "SELECT * FROM games";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGameById($id) {
        $query = "SELECT * FROM games WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertGame($name, $price) {
        $query = "INSERT INTO games (name, price) VALUES (:name, :price)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
    }

    public function updateGame($id, $name, $price) {
        $query = "UPDATE games SET name = :name, price = :price WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function deleteGame($id) {
        $query = "DELETE FROM games WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

// Inicializa a classe User
$user = new User();

// Inicializa a classe Game
$game = new Game();

// Verifica se um registro de usuário está sendo editado
$isEditingUser = false;
$editUserID = 0;
$editUserName = '';
$editUserEmail = '';

// Verifica se um registro de game está sendo editado
$isEditingGame = false;
$editGameID = 0;
$editGameName = '';
$editGamePrice = '';

// Processa o envio do formulário de usuários
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['insert_user'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user->insertUser($name, $email);
    } elseif (isset($_POST['update_user'])) {
        $editUserID = $_POST['edit_user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user->updateUser($editUserID, $name, $email);
        $isEditingUser = false;
    }
}

// Processa o envio do formulário de jogos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['insert_game'])) {
        $name = $_POST['game_name'];
        $price = $_POST['game_price'];
        $game->insertGame($name, $price);
    } elseif (isset($_POST['update_game'])) {
        $editGameID = $_POST['edit_game_id'];
        $name = $_POST['game_name'];
        $price = $_POST['game_price'];
        $game->updateGame($editGameID, $name, $price);
        $isEditingGame = false;
    }
}

// Verifica se um registro de usuário está sendo editado
if (isset($_GET['edit_user'])) {
    $isEditingUser = true;
    $editUserID = $_GET['edit_user'];
    $userData = $user->getUserById($editUserID);
    $editUserName = $userData['name'];
    $editUserEmail = $userData['email'];
}

// Verifica se um registro de jogo está sendo editado
if (isset($_GET['edit_game'])) {
    $isEditingGame = true;
    $editGameID = $_GET['edit_game'];
    $gameData = $game->getGameById($editGameID);
    $editGameName = $gameData['name'];
    $editGamePrice = $gameData['price'];
}

// Verifica se um registro de usuário deve ser apagado
if (isset($_GET['delete_user'])) {
    $deleteUserID = $_GET['delete_user'];
    $user->deleteUser($deleteUserID);
}

// Verifica se um registro de jogo deve ser apagado
if (isset($_GET['delete_game'])) {
    $deleteGameID = $_GET['delete_game'];
    $game->deleteGame($deleteGameID);
}

// Obtém todos os usuários
$users = $user->getAllUsers();

// Obtém todos os jogos
$games = $game->getAllGames();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Aula 08 - Tela CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Usuários</h2>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php if ($isEditingUser): ?>
            <input type="hidden" name="edit_user_id" value="<?php echo $editUserID; ?>">
        <?php endif; ?>
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $editUserName; ?>" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo $editUserEmail; ?>" required><br>

        <?php if ($isEditingUser): ?>
            <button type="submit" name="update_user">Atualizar</button>
        <?php else: ?>
            <button type="submit" name="insert_user">Inserir</button>
        <?php endif; ?>
    </form>

    <h3>Lista de Usuários</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="?edit_user=<?php echo $user['id']; ?>">Editar</a> |
                    <a href="?delete_user=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Jogos</h2>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php if ($isEditingGame): ?>
            <input type="hidden" name="edit_game_id" value="<?php echo $editGameID; ?>">
        <?php endif; ?>
        <label for="game_name">Nome:</label>
        <input type="text" name="game_name" value="<?php echo $editGameName; ?>" required><br>

        <label for="game_price">Preço:</label>
        <input type="text" name="game_price" value="<?php echo $editGamePrice; ?>" required><br>

        <?php if ($isEditingGame): ?>
            <button type="submit" name="update_game">Atualizar</button>
        <?php else: ?>
            <button type="submit" name="insert_game">Inserir</button>
        <?php endif; ?>
    </form>

    <h3>Lista de Jogos</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($games as $game): ?>
            <tr>
                <td><?php echo $game['id']; ?></td>
                <td><?php echo $game['name']; ?></td>
                <td><?php echo $game['price']; ?></td>
                <td>
                    <a href="?edit_game=<?php echo $game['id']; ?>">Editar</a> |
                    <a href="?delete_game=<?php echo $game['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

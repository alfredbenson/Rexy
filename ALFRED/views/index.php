<?php
require_once __DIR__ . "/../config/database.php";

$query = $dbh->query("SELECT id, first_name, last_name, age, email FROM personal_information ORDER BY id DESC");
$users = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">User List</h2>
        <div class="flex justify-end mb-4">
        <a href="FillForm.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New</a>
    </div>
       
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Full Name</th>
                    <th class="border border-gray-300 px-4 py-2">Age</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr class="bg-white hover:bg-gray-100">
                    <td class="border px-4 py-2 text-center"><?php echo $user['id']; ?></td>
                    <td class="border px-4 py-2"><?php echo $user['last_name'] . ', ' . $user['first_name']; ?></td>
                    <td class="border px-4 py-2 text-center"><?php echo $user['age']; ?></td>
                    <td class="border px-4 py-2"><?php echo $user['email']; ?></td>
                    <td class="border px-4 py-2 text-center">
                    <a href="veiwall.php?user_id=<?php echo $user['id']; ?>" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-blue-700">View All</a>
                        <a href="FillFormupdate.php?user_id=<?php echo $user['id']; ?>" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</a>
                        <button onclick="confirmDelete(<?php echo $user['id']; ?>)" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>

</body>
</html>

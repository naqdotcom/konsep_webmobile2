<?php
include 'db.php'; 

$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #C3F0F2; 
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px; 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h1 {
            text-align: center;
            color: #347074; 
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden; 
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 1rem;
        }

        table th {
            background: #347074;
            color: white;
            font-weight: 600;
        }

        table td {
            background-color: #f9f9f9;
            color: #333;
        }

        .btn {
            text-decoration: none;
            padding: 10px 20px;
            margin: 10px 5px;
            border-radius: 8px; 
            color: white;
            text-align: center;
            font-weight: 600;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary {
            background: #347074;
            box-shadow: 0 4px 8px #1d3e41;
        }

        .btn-primary:hover {
            background: #1d3e41;
            transform: translateY(-3px); 
        }

        .btn-warning {
            background: #b49c54;
        }

        .btn-warning:hover {
            background: #7e6c36;
            transform: translateY(-3px);
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-3px);
        }

        /* Style untuk tombol Kembali */
        .btn-secondary {
            display: inline-block;
            padding: 12px 26px;
            background-color: #6c757d; 
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 28px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-3px); 
        }

        .btn-secondary:active {
            transform: translateY(0); 
        }

        /* Responsif: Sesuaikan tombol untuk tampilan kecil */
        @media (max-width: 768px) {
            .btn {
                width: 100%; 
                padding: 14px 0;
            }

            .container {
                padding: 15px; 
                margin: 20px auto; 
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manajemen Tugas</h1>
        <a href="add_task.php" class="btn btn-primary">Tambah Tugas</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php $i = 1; while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= htmlspecialchars($row['title']); ?></td>
                            <td><?= htmlspecialchars($row['description']); ?></td>
                            <td><?= $row['status'] == 'completed' ? 'Selesai' : 'Belum Selesai'; ?></td>
                            <td>
                                <a href="update_task.php?id=<?= $row['id']; ?>" class="btn btn-warning">Ubah Status</a>
                                <a href="delete_task.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Hapus tugas ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Belum ada tugas!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="index.html" class="btn btn-secondary">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
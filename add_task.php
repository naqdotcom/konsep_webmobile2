<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
    if ($conn->query($sql)) {
        header("Location: mulai.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #C3F0F2;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            background: #347074;
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        header h1 {
            font-size: 36px;
            font-weight: 700;
            margin: 0;
        }

        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
            box-sizing: border-box;
        }

        input:focus, textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            text-decoration: none;
            padding: 12px 20px;
            font-size: 18px;
            text-align: center;
            border-radius: 8px;
            color: #fff;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-primary {
            background: #347074;
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            header h1 {
                font-size: 28px;
            }

            .form-container {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Tambah Tugas Baru</h1>
        </div>
    </header>

    <div class="container">
        <div class="form-container">
            <form action="add_task.php" method="POST">
                <div class="form-group">
                    <input type="text" name="title" placeholder="Judul Tugas" required>
                </div>
                <div class="form-group">
                    <textarea name="description" placeholder="Deskripsi Tugas"></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="mulai.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

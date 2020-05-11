<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kondisi</title>
</head>

<body>
    <script>
        function check() {
            // document.getElementById('cuman').remove;
            var c = document.getElementById('kondisi');
            var select = c.options[c.selectedIndex].value;
            var r = c == 1 ? '<a id="cuman">tidak perlu membawa payung</a>' : '<a id="cuman">perlu membwa patung</a>';
            document.getElementById('result').innerHTML = r;
        }
    </script>
    <?php if (!empty($_POST)) :
        $kondisi = $_POST["kondisi"];
        $result = $kondisi == 'hujan' ? 'perlu membawa payung' : ($kondisi == 'panas' ? 'tidak perlu membawa payung' : 'kondisi tidak dikenal');
        ?>
        <a href="location.reload();"><button>Back</button></a>
        <?php echo $result ?>
    <?php else : ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <select name="kondisi" id="kondisi" onchange="check()">
                <option></option>
                <option value="1">panas</option>
                <option value="2">hujan</option>
            </select><br><br>
            <div id="result">
                <a id="cuman"></a>
            </div>
        </form>
    <?php endif; ?>
</body>

</html>
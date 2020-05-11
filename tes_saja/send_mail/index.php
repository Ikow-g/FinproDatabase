<!DOCTYPE html>
<html lang="en">

<head>
    <title>Send Mail</title>
</head>

<body>
    <div>
        <h1>Send Mail</h1>
        <form action="email.php" method="post">
            <label for="name">Name</label><br>
            <input type="text" name="email"><br><br>
            <label for="email">Email</label><br>
            <input type="text" name="name"><br><br>
            <label for="subject">Subject</label><br>
            <input type="text" name="subject"><br><br>
            <label for="name">Massage</label><br>
            <textarea name="msg" cols="30" rows="10"></textarea><br><br>
            <button type="submit">Send</button>
        </form>
    </div>
</body>

</html>
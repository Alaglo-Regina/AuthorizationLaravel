<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
    <div>
        <form action="{{route('login')}}" method="POST">
            @method('POST')
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Veuillez saisir votre mail ..." >
            <br/>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Veuillez saisir votre mot de passe ...">
            <br/>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
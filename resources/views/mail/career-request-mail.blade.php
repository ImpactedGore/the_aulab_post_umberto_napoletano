<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Email Template</title>
  <style>
    /* Stile CSS */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      color: #333;
    }
    
    p {
      color: #666;
      line-height: 1.5;
    }
    
    .oggetto {
      margin-bottom: 20px;
    }
    
    .oggetto h2 {
      margin: 0;
      color: #333;
      font-size: 18px;
    }
    
    .signature {
      margin-top: 40px;
      border-top: 1px solid #ddd;
      padding-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>The Aulab Post</h1>
    
    <div class="oggetto">
      <h2>Abbiamo ricevuto una richiesta</h2>
      <p>Ruolo richiesto: {{$info['role']}}</p>
      <p>Email del richiedente {{$info['email']}}</p>
      <p>Messaggio : {{$info['msg']}}</p>
    </div>
    
    <div class="signature">
      <p>Cordiali saluti,</p>
      <p>Umberto Napoletano</p>
      <p>The Aulab Post</p>
    </div>
  </div>
</body>
</html>
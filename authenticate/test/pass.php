<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="pass.css">
    <title>Show/Hide Password</title>
    <style>
        .parent {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    gap: 8px;
}
    
.div1 {
    grid-column: span 2 / span 2;
    grid-row: span 4 / span 4;
    background-color: red;
}

.div2 {
    grid-column: span 3 / span 3;
    grid-column-start: 1;
    grid-row-start: 5;
    background-color: blue;
}

.div3 {
    grid-column: span 2 / span 2;
    grid-row: span 2 / span 2;
    grid-column-start: 3;
    grid-row-start: 1;
    background-color: violet;
}

.div4 {
    grid-column: span 2 / span 2;
    grid-row: span 2 / span 2;
    grid-column-start: 3;
    grid-row-start: 3;
    background-color: orange;
}

.div5 {
    grid-row: span 3 / span 3;
    grid-column-start: 5;
    grid-row-start: 1;
    background-color: green;
}

.div6 {
    grid-column-start: 5;
    grid-row-start: 4;
    background-color: yellow;
}

.div7 {
    grid-column-start: 5;
    grid-row-start: 5;
    background-color: indigo;
}

.div8 {
    grid-column-start: 4;
    grid-row-start: 5;
    background-color: aqua;
}
        
    </style>
</head>
<body>
<div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
</div>
    

<div class="parent">
    <div class="div1">1</div>
    <div class="div2">2</div>
    <div class="div3">3</div>
    <div class="div4">4</div>
    <div class="div5">5</div>
    <div class="div6">6</div>
    <div class="div7">7</div>
    <div class="div8">8</div>
</div>

<br>
<br>
    <label for="password">Password:</label>
    <input type="password" id="password" placeholder="Enter your password">
    <button onclick="togglePassword()">Show</button>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const toggleButton = document.querySelector("button");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Hide";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Show";
            }
        }
    </script>
</body>
</html>



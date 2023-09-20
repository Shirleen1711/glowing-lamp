<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: "Century Gothic";
            color: #FF0000;
            display: flex;
            justify-content: center; 
            align-items: center;
            height: 530px;
            width: 100%;
            margin: 0;
            position: relative;
        }

        .login-box {
            border: none;
            border-bottom: 1px solid #ccc
            padding: 20px;
            height: 404px;
            max-width: 280px;
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 100;
            background-color: rgba(255, 255, 255, 10);
            border-radius: 10px;
            margin-top: 60px;
        }

        .login-title {
            border-bottom: 1px solid #000000;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .login-box label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
            color: #444;
            text-align: center;
        }

        .login-box input[type="email"],
        .login-box input[type="password"] 
        .login-box input[type="text"] {
            border: none;
            border-bottom: 1px solid #ccc;
            padding: 5px;
            width: 100%;
            margin-bottom: 10px;
            color: #ffffff;
            background-color: transparent;
            text-align: center;
        }

        .login-box button {
            width: 230px;
            height: 35px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 100px;
            margin-top: 20px;
            box-shadow: 0 5px 6px -2px gray;
        }

        .login-box button:hover {
            background-color: #45a049;
        }

        .lock-icon {
            width: 12px;
            height: 15px;
            margin-bottom: 10px;
            position: absolute;
            bottom: 160px;
            right: 80px;
        }

        .bottom-left-text {
            position: fixed;
            bottom: 20px;
            left: 20px;
            color: #000000;
            font-size: 14px;
        }

        .bottom-right-text {
            position: fixed;
            bottom: 20px;
            right: 20px;
            color: rgb(0, 0, 0);
            font-size: 14px;
        }

        .first-image {
            position: fixed;
            bottom: 75px;
            left: 200px;
            width: 660.583px;
            height: 640px;
            flex-shrink: 0;
            z-index: 1;
        }

        /* Add styles for the second image */
        .second-image {
            position: fixed;
            bottom: 75px;
            left: 195px;
            width: 1010px;
            height: 1200px;
            z-index: 1;
        }

        .third-image {
            position: fixed;
            bottom: 120px;
            right: -4px;
            width: 335px;
            height: 595px;
            z-index: 1;
        }

        .fourth-image {
            position: fixed;
            bottom: 75px;
            left: -1px;
            width: 1205px;
            height: 900px;
            border-radius: 10px;
            z-index: -100;
        }

        .fifth-image {
            position: fixed;
            right: 50px;
            width: 253px;
            height: 54px;
            margin-right: 150px;
            z-index: 1;
            margin-top: 5%;
        }

        /* Animasi bergerak menggunakan CSS Transitions */
        .moving-element {
            width: 50px;
            height: 50px;
            background-color: #4CAF50;
            position: relative;
            transition: transform 2s ease;
        }

        .moving-element:hover {
            transform: translateX(100px);
        }

        .additional-info {
            background-color: #8df2ff;
            padding: 1px;
            border-radius: 5px;
            text-align: center;
            margin-top: 10px;
            font-size: 12px; /* Atur ukuran font */
            color: #000000; /* Atur warna font */
            border: 1px solid #000000; /* Atur ukuran border dan warna */
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            align-items:center;
        }

        .additional-info a {
            text-decoration: none; /* Menghapus garis bawah default pada link */
            color: #007BFF; /* Atur warna teks untuk link */
            font-weight: bold; /* Atur tebal teks untuk link */
        }

        .additional-info a:hover {
            text-decoration: underline; /* Memberikan garis bawah saat link dihover */
        }

        .greeting-text {
            border: 1px solid #FF0000; /* Tambahkan garis batas di sekitar teks */
            padding: 2px 5px; /* Atur padding di sekitar teks */
            border-radius: 4px; /* Tambahkan radius sudut pada garis batas */
        }

        .info-text {
        display: inline-block; /* Mengatur agar elemen memiliki lebar yang sesuai dengan teks */
        vertical-align: middle; /* Mengatur agar elemen berada pada posisi vertikal yang sama dengan logo */
        }

        .info-content{
            flex: 1;
        }

/* Additional style for the "Unblock" link */
    .unblock-link {
    color: #007BFF; /* Set link color */
    text-decoration: underline; /* Underline the link */
    cursor: pointer; /* Change cursor to a hand pointer on hover */
    font-weight: bold;
}

    .unblock-link:hover {
    text-decoration: none; /* Remove underline on hover */
}

/* Adjust the spacing between "Bapak/Ibu" and "Unblock" link */
    .additional-info p {
    margin-bottom: 5px;
}

        #popup-modal {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
            visibility: hidden;
            background-color: rgb(213, 254, 247);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        #popup-modal h3 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        #countries {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        #popup-modal button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 100px;
            margin-top: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #popup-modal button:hover {
            background-color: #45a049;
        }

        /* ... kode CSS sebelumnya ... */

/* Dark Mode Slider */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    top: -300px;
    left: -700px;
    z-index: 10;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

/* Tambahkan gaya untuk mengatur ukuran slider */
.slider {
    width: 50px;
    height: 25px;
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 34px;
}

/* ... kode CSS lainnya ... */


.slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #2196F3;
}

input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Tambahkan kelas dark-mode untuk mengatur gaya mode gelap */
.dark-mode {
  background-color: #121212; /* Ubah warna latar belakang ke gelap */
  color: #ffffff; /* Ubah warna teks ke putih */
}

/* Tambahkan gaya untuk mode gelap pada elemen-elemen */
.dark-mode .login-box {
  background-color: #1a1a1a;
  color: #ffffff;
}

.dark-mode label,
.dark-mode input {
  color: #ffffff;
}

.dark-mode button {
  background-color: #4CAF50;
  color: #ffffff;
}

.dark-mode .additional-info a {
  color: #007BFF;
}

/* Ubah warna teks dan latar belakang pada elemen-elemen tertentu */
.dark-mode input[type="text"],
.dark-mode input[type="password"],
.dark-mode input[type="email"] {
  background-color: #00293C; /* Ubah warna latar belakang input */
  color: #ffffff; /* Ubah warna teks input */
}

.dark-mode .login-title {
  border-bottom: 1px solid #ffffff; /* Ubah warna garis bawah pada judul login */
}

.dark-mode .bottom-left-text,
.dark-mode .bottom-right-text {
  color: #ffffff; /* Ubah warna teks pada footer */
}

/* Gaya untuk slider dark mode */
.dark-mode .switch .slider {
  background-color: #ccc;
}

.dark-mode .switch .slider:before {
  background-color: white;
}

.dark-mode input:checked + .slider {
  background-color: #2196F3;
}

.dark-mode input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

.dark-mode input:checked + .slider:before {
  transform: translateX(26px);
}

.dark-mode .additional-info {
  background-color: #00293C; /* Ubah warna latar belakang menjadi biru dongker */
  color: #ffffff; /* Ubah warna teks */
}

/* Additional style for the first image */
.dark-mode .second-image {
    filter: brightness(1%); /* Apply a filter to darken the image */
}

/* Additional style for the second image */
.dark-mode .fourth-image {
    filter: sepia(100%) invert(100%); /* Apply a filter to give a sepia tone and invert the colors */
}

/* Gaya tambahan untuk teks "Telkomsel" saat dark mode aktif */
.dark-mode .fifth-image span {
    color: #ffffff; /* Mengatur warna teks menjadi putih saat dark mode aktif */
}

/* Gaya tambahan untuk kotak "Silahkan pilih TTC tersedia" saat dark mode aktif */
.dark-mode #countries {
    background-color: #121212; /* Mengatur warna latar belakang menjadi gelap saat dark mode aktif */
    color: #ffffff; /* Mengatur warna teks menjadi putih saat dark mode aktif */
}

/* Gaya tambahan untuk kotak "Silahkan pilih TTC tersedia" saat dark mode aktif */
.dark-mode #popup-modal {
    background-color: #000000; /* Mengatur warna latar belakang menjadi gelap saat dark mode aktif */
    color: #ffffff; /* Mengatur warna teks menjadi putih saat dark mode aktif */
}

</style>
</head>
<body>
    <div class="background-overlay" onclick="hidePopup()"></div>
     <div class="login-box">
        <h2 class="login-title">LOGIN DACITA</h2>
        <form action="login" method="POST" id="login-form" onsubmit="return checkLogin()">
            @csrf
            <label for="email">Username:</label>
            <input type="text" name="email" id="email" required placeholder="name@example.com" autofocus required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required placeholder="password" autofocus required>
            <button type="submit">Log In</button>
        </form>
        <label class="switch">
            <input type="checkbox" id="dark-mode-toggle">
            <span class="slider round"></span>
        </label>
        <div class="additional-info">
            <p>Bapak/Ibu untuk akses Gita dialihkan ke <a href="https://www.example.com"> MyVisitors.</a></p>
            <p><span class="unblock-link" onclick="unblockAccount()">Unblock</span>akun Anda jika terblokir.</p>
        </div>
    </div>
    </div>
    </div>
    <img class="first-image" src="suasana kerja di telkom.png" alt="Gambar Petama">
    <img class="second-image" src="merah.png" alt="Gambar Kedua">
    <img class="third-image" src="element.png" alt="Gambar Ketiga">
    <img class="fourth-image" src="kotak.png" alt="Keempat">
    <img class="fifth-image" src="LOGO TELKOMSEL.png" alt="Kelima">
    <p class="bottom-left-text">Login to access your account</p>
    <p class="bottom-right-text">Developed by IT Support - Bussiness Jabotabek@2020</p>

    <div id="popup-modal" class="top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full" onclick="event.stopPropagation()">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="p-6 text-center">

                    <div class="popup-background" id="popup-background">
                        <div class="popup-content">
                            <h3 class="mb-5 text-lg font-normal text-blue-500 " style="font-weight: bold; ">Silahkan pilih TTC yang tersedia</h3>
                            <select id="countries" class="mb-5  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>--- pilih TTC yang tersedia ---</option>
                                <option value="US">Jakarta Barat</option>
                                <option value="CA">Jakarta Pusat</option>
                                <option value="FR">Jakarta Selatan</option>
                                <option value="DE">Jakarta Timur</option>
                            </select>
                            <a href="/myproject/laravel10/Home">
                                <button data-modal-hide="popup-modal" type="button" class="w-4/6 text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm  items-center px-5 py-2.5 text-right  mr-2" style="text-align: center;">
                                    SELESAI
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
   
    <script>

        // Dapatkan elemen <body> dan <div class="login-box">
        const body = document.body;
        const loginBox = document.querySelector('.login-box');

        // Dapatkan tombol slider dark mode
        const darkModeToggle = document.getElementById('dark-mode-toggle');

        // Tambahkan event listener untuk mengubah mode ketika slider diubah
        darkModeToggle.addEventListener('change', function () {
            // Toggle class 'dark-mode' pada elemen <body> untuk mengubah mode gelap
            body.classList.toggle('dark-mode');

            // Toggle class 'dark-mode' pada elemen <div class="login-box"> untuk mengubah tampilan login box
            loginBox.classList.toggle('dark-mode');

            // Simpan preferensi dark mode menggunakan localStorage
            if (darkModeToggle.checked) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.setItem('darkMode', 'disabled');
            }
        });

        // Cek status dark mode saat halaman dimuat
        window.addEventListener('load', function () {
            const darkModeStatus = localStorage.getItem('darkMode');
            if (darkModeStatus === 'enabled') {
                darkModeToggle.checked = true;
                body.classList.add('dark-mode');
                loginBox.classList.add('dark-mode');
            } else {
                darkModeToggle.checked = false;
                body.classList.remove('dark-mode');
                loginBox.classList.remove('dark-mode');
            }
        });


        document.addEventListener("click", function(event) {
        const popupModal = document.getElementById("popup-modal");
        if (event.target !== popupModal && !popupModal.contains(event.target)) {
            hidePopup();
        }
        });
        function showPopup() {
        document.getElementById("popup-modal").style.visibility = "visible";
        }
        function showPopup() {
        document.getElementById("popup-modal").style.visibility = "visible";    
        }
        // Fungsi untuk menyembunyikan pop-up
        function hidePopup() {
            document.getElementById("popup-background").style.display = "hidden";
        }

        function checkLogin() {
            // Get input values
            const emailInput = document.getElementById("email");
            const passwordInput = document.getElementById("password");

             // Validasi email
             const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                alert("Email tidak valid. Mohon masukkan email yang benar.");
                return false;
            }
            
            // Check if the data is correct (for demonstration, let's assume email "user@example.com" and password "123456" are correct)
            if (emailInput.value === "coba@gmail.com" && passwordInput.value === "123456") {
                // If correct, change input box colors to green
                emailInput.style.borderColor = "green";
                passwordInput.style.borderColor = "green";
            
                 
                document.getElementById("popup-modal").style.visibility = "visible";
            } else {
                // If incorrect, change input box colors to red

                emailInput.style.borderColor = "red";
                passwordInput.style.borderColor = "red";
            }

            // Prevent form submission (we'll handle the form submission in JavaScript)
            return false;
        }

        function unblockAccount() {
            // Implement the logic to unblock the account here
            // For example, you can show a message or perform any other action as needed
            alert("Your account is now unblocked!");
        }
    </script>
</body>
</html>
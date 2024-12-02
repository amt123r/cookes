<!DOCTYPE html>
<html lang="ar">
<head>
    <title>اختيار اللغة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>اختيار اللغة</h2>
    @if (session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif
    <form id="languageForm" method="POST" action="{{ route('language.store') }}">
        @csrf
        <label for="language">اختر لغة:</label>
        <select id="language" name="language">
            <option value="arabic">العربية</option>
            <option value="english">الإنجليزية</option>
            <option value="french">الاندنوسيه</option>
        </select>
        <br><br>
        <label>
            <input type="checkbox" id="remember" name="remember"> تذكرني
        </label>
        <br><br>
        <button type="submit">حفظ</button>
    </form>
</div>

<script>
    // تحميل اللغة المحفوظة من الكوكيز
    window.onload = function() {
        const savedLanguage = getCookie("selectedLanguage");
        const rememberMe = getCookie("rememberMe") === "true";

        if (savedLanguage) {
            document.getElementById('language').value = savedLanguage;
        }
        document.getElementById('remember').checked = rememberMe;
    };

    // دالة لجلب قيمة الكوكي
    function getCookie(name) {
        const value =  ${document.cookie};
        const parts = value.split( ${name}=);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    // حفظ اللغة في الكوكيز عند إرسال النموذج
    document.getElementById('languageForm').onsubmit = function() {
        const selectedLanguage = document.getElementById('language').value;
        const rememberMe = document.getElementById('remember').checked;

        if (rememberMe) {
            document.cookie = selectedLanguage=${selectedLanguage}; path=/;;
            document.cookie = rememberMe=true; path=/;;
        } else {
            document.cookie = selectedLanguage=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;;
            document.cookie = rememberMe=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;;
        }
    };
</script>

</body>
</html>
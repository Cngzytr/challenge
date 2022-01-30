
@include('sections.head')
<style>
    .__login {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: grid;
        align-items: center;
        justify-content: center;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: var(--text);
        overflow-y: auto;
    }
    .__login-area {
        width: 500px;
        box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2); 
        border-radius: 5px;
        position: relative;
        z-index: 1;
        background: inherit;
        overflow: hidden;
        display: grid;
        align-items: center;
        justify-items: center;
        font-family: sans-serif;
        padding: 0 40px;
    }
    .__form {
        display: grid;
        color: var(--color);
        margin: 10px 0;
        width: 100%;
    }
    .__form label {
        font-family: sans-serif;
        margin-bottom: 10px;
    }
    .__form input {
        padding: 5px;
        background: unset;
        border-bottom: 1px solid #000;
        color: var(--color);
    }
    .__form input:focus-visible {
        outline: 0;
    }
    .__form input:focus {
        --tw-ring-shadow: unset;
    }
    .__login-area button {
        margin-bottom: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 40px;
        background: unset;
        border: 1px solid #000;
        font-size: 16px;
        color: var(--color);
        cursor: pointer;
    }
</style>
<div class="__login">
    <div class="__login-area">
        @csrf
        <div class="__form">
            <label for="name">Site URL</label>
            <input type="text" name="site_url" id="site_url">
        </div>
        <div class="__form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="__form">
            <label for="name">Surname</label>
            <input type="text" name="surname" id="surname"> 
        </div>
        <div class="__form">
            <label for="name">Company Name</label>
            <input type="text" name="company_name" id="company_name">
        </div>
        <div class="__form">
            <label for="email">E-Mail</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="__form">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit" onclick="save()" id="login-button">
            Register
        </button>
    </div>
</div>
<input type="hidden" name="" value="{{ csrf_token() }}" id="csrf">
<script>
    function save() {
        let data = new FormData();
        data.append('site_url', document.querySelector('#site_url').value);
        data.append('name', document.querySelector('#name').value);
        data.append('surname', document.querySelector('#surname').value);
        data.append('company_name', document.querySelector('#company_name').value);
        data.append('email', document.querySelector('#email').value);
        data.append('password', document.querySelector('#password').value);
        data.append('_token', document.querySelector('#csrf').value);

        window.http.spec('/register', data).then(response => {
            response.json().then(body => {
                if(body.status == true) {
                    document.querySelector('#login-button').innerHTML = body.msg + ' Yönlendiriliyorsunuz.';

                    setTimeout(() => {
                        window.location.href = '/';
                    }, 4000);
                }else {
                    document.querySelector('#login-button').innerHTML = body.msg[0];
                }
            });
        });
    }
</script>
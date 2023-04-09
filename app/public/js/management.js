function addAdminAccount() {
    const account = {
        username: document.getElementById('username').value,
        password: document.getElementById('password').value,
        email: document.getElementById('email').value,
        role: 2,
        criticaccount: false,
        company: 'none'
    }
    console.log(account);
    fetch('http://localhost/api/management', {
        method: 'POST',
        //mode: 'no-cors',
        headers: {
            'Content-Type': 'application/json',

        },
        body: JSON.stringify(account),
    }).catch(err => console.error(err));

    appendAccount(account);
    document.getElementById('add-account').style.display = 'none';
    document.getElementById('add-account').reset();
}

function appendAccount($account) {
    const accountlist = document.getElementById('admintable')
    const tablerow = document.createElement('tr');
    const username = document.createElement('td');
    username.innerHTML = $account.username;
    username.scope = 'row';
    const password = document.createElement('td');
    password.innerHTML = '********';
    const email = document.createElement('td');
    email.innerHTML = $account.email;
    const role = document.createElement('td');
    role.innerHTML = 'Admin';

    tablerow.appendChild(username);
    tablerow.appendChild(password);
    tablerow.appendChild(email);
    tablerow.appendChild(role);

    accountlist.appendChild(tablerow);
}

function loadData() {
    fetch('http://localhost/api/management')
        .then(response => response.json())
        .then((accounts) => {

            accounts.forEach(element => {
                appendAccount(element);
            });

            console.log('Output: ', accounts);
        }).catch(err => console.error(err));
}

loadData();
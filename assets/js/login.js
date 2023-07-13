function loginSummit() {
    username = document.getElementById("input_username").value;
    password = document.getElementById("input_password").value;

	$.ajax({
		url: "http://127.0.0.1/tasklist/api/auth/login",
		method: "POST",
		data: {
			username: username,
			password: password,
		},
		dataType: "json",
		success: function (data) {
			resData = data["data"];
			localStorage.setItem("user_id", data["user_id"]);
			window.location.href = "http://127.0.0.1/tasklist/overview";
		},
		error: function (err) {
			console.log(err.responseJSON.message);
			alert(err.responseJSON.message);
		},
	});
}

function registerSummit() {
    username = document.getElementById("enter_username").value;
	password = document.getElementById("enter_password").value;
	confirmPassword = document.getElementById("confirm_password").value;

    if (password !== confirmPassword) {
		alert("Password doesn't match!");
		return false;
	}
	// Check if the username already exists
	$.ajax({
		url: "http://127.0.0.1/tasklist/api/auth/check_username",
		method: "POST",
		data: { username: username },
		dataType: "json",
		success: function (data) {
			if (data.exists) {
				alert("Username already exists!");
			} else {
				$.ajax({
					url: "http://127.0.0.1/tasklist/api/auth/register",
					method: "POST",
					data: {
						username: username,
						password: password,
					},
					dataType: "json",
					success: function (data) {
						window.location.href = "http://127.0.0.1/tasklist/home";
					},
					error: function (err) {
						console.log(err.responseJSON.message);
					},
				});
			}
		},
		error: function (err) {
			console.log(err.responseJSON.message);
		},
	});
}
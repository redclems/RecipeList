class paswordForm {
	constructor() {
		this._login = document.getElementById('userLogin373892JD838js82');
		this._pasword = document.getElementById('userPass373892JD838js82');
		this._imgView = document.getElementById('viewIMG');

		const self = this;

		this._imgView.onclick = (e) => self.viewPassword(e);
	}

	viewPassword(e){
		if(this._pasword.type == "password"){
			this._pasword.type = "text";
			this._imgView.src = "../../../image/icon/eyesHint.svg";
		}else{
			this._pasword.type = "password";
			this._imgView.src = "../../../image/icon/eyes.svg";

		}
	}

	load(){

	}
}
window.onload = async () => {
		const app = new paswordForm();

		await app.load();
}

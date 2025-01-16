<?php $this->view('header') ?>
<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>"  alt="Loading..."/>
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<script type="module">
	// Import the functions you need from the SDKs you need
	import {initializeApp} from "https://www.gstatic.com/firebasejs/9.6.4/firebase-app.js";
	import {getAnalytics} from "https://www.gstatic.com/firebasejs/9.6.4/firebase-analytics.js";
	import {
		getStorage,
		ref,
		uploadBytesResumable,
		getDownloadURL,
		deleteObject
	} from "https://www.gstatic.com/firebasejs/9.6.4/firebase-storage.js";
	// TODO: Add SDKs for Firebase products that you want to use
	// https://firebase.google.com/docs/web/setup#available-libraries

	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	const firebaseConfig = {
		apiKey: "AIzaSyDr0Sppv8jay3LHJlVN1MJOumhQAFL6sfU",
		authDomain: "school-39299.firebaseapp.com",
		projectId: "school-39299",
		storageBucket: "school-39299.appspot.com",
		messagingSenderId: "976696419627",
		appId: "1:976696419627:web:27a363eba655227bb3d16e",
		measurementId: "G-JXE0BZPLJB"
	};

	// Initialize Firebase
	const app = initializeApp(firebaseConfig);
	const analytics = getAnalytics(app);

	const loaderMessage = document.getElementById('loader-message')
	loaderMessage.innerText = "Deleting..."
	const loader = document.querySelector(".loader");
	loader.className = "loader";

	var file = '<?php if (isset($file)) echo $file->file; ?>';

	// Create a reference to the file to delete
	const storage = getStorage();
	var storageRef = ref(storage,  '<?php echo $this->config->item("schoolDir") ?>' + '/homework/' + file)

	deleteObject(storageRef).then(() => {
		// File deleted successfully
		loaderMessage.innerText = "File Deleted. Now deleting post..."
	}).catch((error) => {
		loader.className = "loader hidden";
		alert("Unable to delete")
	});
</script>

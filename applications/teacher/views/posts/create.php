<?php $this->view('header') ?>

<style>
	body {
		background: #f4f4f9;
		font-family: Arial, sans-serif;
	}

	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		height: max-content;
	}

	.exam-card {
		background: rgba(255, 255, 255, 0.9);
		backdrop-filter: blur(10px);
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(255, 255, 255, 0.3);
		border-radius: 12px;
		padding: 20px;
		width: 90%;
		max-width: 600px;
		opacity: 0;
		transform: translateY(30px);
		animation: fadeIn 0.6s ease-out forwards;
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
			transform: translateY(30px);
		}

		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.details {
		font-weight: bold;
		margin-top: 10px;
	}

	.form-input,
	.form-select,
	.message-input-box {
		width: 100%;
		padding: 5px;
		margin-top: 5px;
		border: 1px solid #ccc;
		border-radius: 8px;
	}

	.form-submit {
		background: #007bff;
		color: white;
		border: none;
		padding: 10px;
		border-radius: 8px;
		cursor: pointer;
		width: 100%;
		transition: 0.3s;
	}

	.form-submit:hover {
		background: #0056b3;
	}

	.
	/* Animated Heading */
	/* .animated-heading {
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: Nunito-Semibold;
		text-transform: capitalize;
		color: #4F6476;
		font-size: 20px;
		margin-bottom: 20px;
		animation: slideDown 1s ease-in-out;
	}

	.animated-heading i {
		font-size: 24px;
		color: #6C63FF;
		margin-right: 8px;
		animation: bounce 1.5s infinite ease-in-out;
	} */
</style>

<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>" alt="Loading..." />
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<div class="container">
<div class="exam-card">
	<form id="postForm" method="POST" enctype="multipart/form-data" action="<?php echo site_url('post/save') ?>">
		<div class="col-md-4">

			<p class="details">
				Text
			</p>
			<textarea name="text" class="message-input-box"><?php echo set_value('name') ?></textarea>
			<?php if (form_error('text')) { ?>
				<?php echo form_error(
					'text',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>'
				)
					?>
			<?php } ?>

			<p class="details">
				File
			</p>
			<input type="file" name="file" id="file" class="form-input" />

			<button type="submit" class="form-submit">Create</button>
		</div>
		<div class="col-md-4">

		</div>
		<div class="col-md-4">

		</div>

	</form>
	</div>

</div>

<script type="module">
	// Import the functions you need from the SDKs you need
	import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.4/firebase-app.js";
	import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.4/firebase-analytics.js";
	import { getStorage, ref, uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.6.4/firebase-storage.js";
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

	document.getElementById('postForm').onsubmit = function (e) {
		const loaderMessage = document.getElementById('loader-message')
		loaderMessage.innerText = "Creating a New Message..."
		const loader = document.querySelector(".loader");
		loader.className = "loader";

		e.preventDefault();

		const file = document.querySelector('#file').files[0];
		if (file === undefined || file === null) {
			document.getElementById("postForm").submit();
		} else {
			const storage = getStorage();

			// Create the file metadata
			/** @type {any} */
			const metadata = {
				contentType: file.type
			};

			// Upload file and metadata to the object 'images/mountains.jpg'
			const storageRef = ref(storage, '<?php echo $this->config->item("schoolDir") ?>' + '/posts/' + file.name);
			const uploadTask = uploadBytesResumable(storageRef, file, metadata);

			// Listen for state changes, errors, and completion of the upload.
			uploadTask.on('state_changed',
				(snapshot) => {
					// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
					const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
					loaderMessage.innerText = "Uploading Files..."
					console.log('Upload is ' + progress + '% done');
					switch (snapshot.state) {
						case 'paused':
							console.log('Upload is paused');
							break;
						case 'running':
							console.log('Upload is running');
							break;
					}
				},
				(error) => {
					// A full list of error codes is available at
					// https://firebase.google.com/docs/storage/web/handle-errors
					switch (error.code) {
						case 'storage/unauthorized':
							// User doesn't have permission to access the object
							break;
						case 'storage/canceled':
							// User canceled the upload
							break;

						// ...

						case 'storage/unknown':
							// Unknown error occurred, inspect error.serverResponse
							break;
					}
				},
				() => {
					// Upload completed successfully, now we can get the download URL
					getDownloadURL(uploadTask.snapshot.ref).then((downloadURL) => {
						console.log('File available at', downloadURL);
						const url = document.createElement('input');
						url.setAttribute("type", "hidden");
						url.setAttribute("name", "url");
						url.setAttribute("value", downloadURL);
						document.getElementById("postForm").appendChild(url);

						const uploadedFile = document.createElement('input');
						uploadedFile.setAttribute("type", "hidden");
						uploadedFile.setAttribute("name", "file");
						uploadedFile.setAttribute("value", file.name);
						document.getElementById("postForm").appendChild(uploadedFile);

						loaderMessage.innerText = "Upload Complete..."
						document.getElementById("postForm").submit();
						loaderMessage.innerText = "Sending Notifications..."
					});
				}
			);
		}
	}
</script>
<?php $this->view('footer') ?>
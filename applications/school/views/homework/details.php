<?php $this->view('header'); ?>
	<div class="loader hidden">
		<img src="<?php echo base_url('assets/gif/giphy.gif') ?>"  alt="Loading..."/>
		<span class="loader-message" id="loader-message">Loading...</span>
	</div>
	<div class="col-md-12 innerview">
		<div class="col-md-12">
			<form id="homework-form" method="POST" action="<?php echo site_url('homework/submit'); ?>" enctype="multipart/form-data">
			<div class="col-md-4">
				<input
						type="hidden"
						name="class"
						class="form-input"
						value="<?php echo $class; ?>"
				/>

				<p class="details">
					Subject
				</p>
				<select name="subject" class="form-select">
					<?php if (isset($subjects)) { ?>
						<?php foreach($subjects as $row) {?>
							<option value="<?php echo $row->Subjectname; ?>"><?php echo $row->Subjectname; ?></option>
						<?php } ?>
					<?php } ?>
				</select>

				<p class="details">
					Homework
				</p>
				<textarea name="assignment" class="message-input-box"></textarea>
				<?php if (form_error('assignment')) { ?>
					<?php echo form_error('assignment',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<p class="details">
					Image
				</p>
				<input
						type="file"
						name="file"
						id="file"
						class="form-input"
				/>
			</div>
			<div class="col-md-4">

			</div>
			<div class="col-md-4">

			</div>
				<div class="col-md-12">
					<button type="submit" class="form-submit">
						Add Homework
					</button>
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

	document.getElementById('homework-form').onsubmit = function(e) {
		const loaderMessage = document.getElementById('loader-message')
		loaderMessage.innerText = "Creating a New Homework..."
		const loader = document.querySelector(".loader");
		loader.className = "loader";

		e.preventDefault();

		const file = document.querySelector('#file').files[0];
		if ( file === undefined || file === null ) {
			document.getElementById("homework-form").submit();
		} else {
			const storage = getStorage();

// Create the file metadata
			/** @type {any} */
			const metadata = {
				contentType: file.type
			};

// Upload file and metadata to the object 'images/mountains.jpg'
			const storageRef = ref(storage, '<?php echo $this->config->item("schoolDir") ?>' + '/homework/' + file.name);
			const uploadTask = uploadBytesResumable(storageRef, file, metadata);

// Listen for state changes, errors, and completion of the upload.
			uploadTask.on('state_changed',
					(snapshot) => {
						// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
						const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
						loaderMessage.innerText = "Uploading Files..." + progress + '% done';
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
							document.getElementById("homework-form").appendChild(url);

							const uploadedFile = document.createElement('input');
							uploadedFile.setAttribute("type", "hidden");
							uploadedFile.setAttribute("name", "file");
							uploadedFile.setAttribute("value", file.name);
							document.getElementById("homework-form").appendChild(uploadedFile);

							loaderMessage.innerText = "Upload Complete..."
							document.getElementById("homework-form").submit();
							loaderMessage.innerText = "Sending Notifications..."
						});
					}
			);
		}
	}
</script>
<?php $this->view('footer'); ?>

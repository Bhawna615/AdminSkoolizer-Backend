<?php $this->view('header'); ?>
<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>"  alt="Loading..."/>
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<div class="col-md-12" style="padding: 30px;">
	<form id="msgForm" method="POST" action="<?php echo site_url('message/send'); ?>" enctype="multipart/form-data">
		<div class="col-md-4">
			<p class="details">Message</p>
			<textarea name="message" rows="5" placeholder="Write here..." class="message-input-box"></textarea>
			<?php if (form_error('message')) { ?>
				<?php echo form_error('message',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

			<p class="details">Attach File (Optional)</p>
			<input type="file" name="file" id="file" class="form-input">
		</div>

		<div class="col-md-12" style="margin-top: 30px;">
			<p style="font-family: Nunito_regular; font-size: 25px; color: black; text-align: center;">Select
				Recipients</p>
			<p style="font-family: Nunito_regular; font-size: 18px; color: black;"><input type="checkbox" name="" id="selectall" value="">
				Select All</p>
			<?php foreach ($classes as $key) { ?>
				<div class="col-md-12" style="margin-bottom: 30px;">
					<p style="font-family: Nunito_regular; font-size: 18px; color: black;">
                        <input type="checkbox" name="" id="<?php echo $key->Classname; ?>"> <?php echo "Class " . $key->Classname; ?>
					</p>
					<div class="col-md-12">
						<table class="table table-responsive table-bordered">
							<thead class="dataTableHead">
								<tr>
									<th>Select</th>
									<th>Roll No.</th>
									<th>Name</th>
								</tr>
							</thead>
							<tbody class="dataTableBody">
							<?php foreach ($recipients as $row) {
								if ($key->Classname == $row->Class) { ?>
									<tr>
										<td>
											<input type="checkbox" name="id[]" class="<?php echo $row->Class; ?>"
												   value="<?php echo $row->id; ?>">
											<?php if (form_error('id[]')) { ?>
												<?php echo form_error('id[]',
														'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
														'</div>')
												?>
											<?php } ?>
										</td>
										<td><?php echo $row->Rollno; ?></td>
										<td><?php echo $row->Name; ?></td>
									</tr>
								<?php } ?>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php } ?>
		</div>
		<button class="float" title="Send" style="border: none;"><i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">send</i></button>
	</form>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<?php foreach ($classes as $row) { ?>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#<?php echo $row->Classname; ?>").click(function () {
				if (this.checked) {
					$('.<?php echo $row->Classname; ?>').each(function () {
						$(".<?php echo $row->Classname; ?>").prop('checked', true);
					})
				} else {
					$('.<?php echo $row->Classname; ?>').each(function () {
						$(".<?php echo $row->Classname; ?>").prop('checked', false);
					})
				}
			});
		});

	</script>
<?php } ?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#selectall").click(function () {
			if (this.checked) {
				$('input[type=checkbox]').each(function () {
					$("input[type=checkbox]").prop('checked', true);
				})
			} else {
				$('input[type=checkbox]').each(function () {
					$("input[type=checkbox]").prop('checked', false);
				})
			}
		});
	});
</script>
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

	document.getElementById('msgForm').onsubmit = function(e) {
			const loaderMessage = document.getElementById('loader-message')
			loaderMessage.innerText = "Creating a New Message..."
			const loader = document.querySelector(".loader");
			loader.className = "loader";

		e.preventDefault();

		const file = document.querySelector('#file').files[0];
		if ( file === undefined || file === null ) {
			document.getElementById("msgForm").submit();
		} else {
			const storage = getStorage();

// Create the file metadata
			/** @type {any} */
			const metadata = {
				contentType: file.type
			};

// Upload file and metadata to the object 'images/mountains.jpg'
			const storageRef = ref(storage, '<?php echo $this->config->item("schoolDir") ?>' + '/messages/' + file.name);
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
							document.getElementById("msgForm").appendChild(url);

							const uploadedFile = document.createElement('input');
							uploadedFile.setAttribute("type", "hidden");
							uploadedFile.setAttribute("name", "file");
							uploadedFile.setAttribute("value", file.name);
							document.getElementById("msgForm").appendChild(uploadedFile);

							loaderMessage.innerText = "Upload Complete..."
							document.getElementById("msgForm").submit();
							loaderMessage.innerText = "Sending Notifications..."
						});
					}
			);
		}
	}
</script>
<?php $this->view('footer'); ?>

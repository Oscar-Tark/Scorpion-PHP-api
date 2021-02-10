const uploadFile = (id) =>
{
	var file_uploaders = document.getElementById(id);
	var file = file_uploaders.files[0];
	send_ajax_files(file);
	return;
}

$('.collapsible').collapsible();

$('#upload_news').on('submit', e => {
	e.preventDefault();
	$('#response-message').text('Uploading');
	let form_data = new FormData();
	let img = $('#cover').prop('files')[0];
	form_data.append('cover[]', img, img.name);
	$.ajax({
		type: 'POST',
		url: '/admin/upload.php',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: json => {
			let data = JSON.parse(json);
			if (data.success) {
				$('#response-message').text('File uploaded');
				let date = new Date().toLocaleDateString();
				let html = `
				<li>
					<div class="collapsible-header"><i class="material-icons">library_books</i>${$(
						'#titolo'
					).val()}</div>
					<div class="collapsible-body" id="">
					<div class="row">
						<span><b>Description:</b>${$('#descrizione').val()}</span><br>
						<span><b>Date:</b>${date}</span><br>
						<span><b>Target:</b>${$('#target').val()}</span><br>
						<span><b>Cover:</b></span><br>
						<img src="${data.path}" class="responsive-img"style="height:300px;">
					</div>
					<div class="row">
						<a href="#"><button type="button"  class="btn orange">Go to news</button></a>
					</div>
					</div>
				</li>
				`;
				// Add fake news
				$('#news-list').append(html);
			} else {
				$('#response-message').text(data.error);
			}
		}
	});
	return false;
});

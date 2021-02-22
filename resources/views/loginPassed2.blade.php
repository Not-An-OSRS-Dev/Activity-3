@if($model->getUsername() == 'mark')
	<h3>{{ $model->getUsername() }} you have logged in successfuly. </h3>
@else
	<h3>Someone besides mark logged in successfully. </h3>
@endif
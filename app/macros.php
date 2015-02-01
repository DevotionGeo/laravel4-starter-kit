<?php

Form::macro('month', function($name, $value = null){
	$html = '<select name="'.$name.'" id="'.$name.'">';

	for($m = 1; $m <= 12; $m++){
		$html .= '<option value="'.$m.'" '.((date('m') == $m) ? 'selected="selected"' : '').'>'.(($m < 10) ? sprintf('0%s', $m) : $m).'</option>';
	}

	$html .= '</select>';

	return $html;
});

Form::macro('year', function($name, $value = null, $offset = 2){
	$html = '<select name="'.$name.'" id="'.$name.'">';

	for($year = date('Y') - $offset; $year <= date('Y'); $year++){
 		$html .= '<option value="'.$year.'" '.((date('Y') == $year) ? 'selected="selected"' : '').'>'.$year.'</option>';
	}

	$html .= '</select>';

	return $html;
});

Form::macro('users', function($name, $multiple = false){
	$html = '';
	$user = Sentry::getUser();
	if($user->hasAccess('expenses.all')){
		$html .= '<select class="form-control" name="'.$name.(($multiple == true) ? '[]' : '').'" id="'.$name.'" '.(($multiple == true) ? 'multiple="multiple"' : '').'>';
		foreach(User::all() as &$user){
	 		$html .= '<option value="'.$user->id.'">'.$user->fullName().'</option>';		
		}
		$html .= '</select>';
	}
	else {
		$html .= '<input value="'.$user->id.'" type="hidden" name="'.$name.(($multiple == true) ? '[]' : '').'" id="'.$name.'" '.(($multiple == true) ? 'multiple="multiple"' : '').' />';
		$html .= '<input type="text" disabled="disabled" value="'.$user->fullName().'" class="form-control" />';
	}

	return $html;
});
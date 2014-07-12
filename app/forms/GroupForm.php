<?php

class GroupForm extends BaseForm
{
	public function isValidForAdd($rules)
	{
		return $this->isValid($rules);
	}

	public function isValidForEdit($rules)
	{
		return $this->isValid($rules);
	}

	public function isValidForDelete()
	{
		return $this->isValid([
		"id" => "exists:despesa,id"
		]);
	}
}
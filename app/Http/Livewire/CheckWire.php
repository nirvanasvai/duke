<?php

namespace App\Http\Livewire;

use App\Models\Check;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class CheckWire extends Component
{
	use WithFileUploads;
	
	//variable create
	public $user,$image,$code,$type,$status;
	
	
	protected $rules = [
		'image'=>'mimes:jpeg,jpg,png,gif|required|max:2048',
	];
	
	protected $messages = [
		'image.mimes'=>'Не подходящий формат',
		'image.max'=>'Размер не должно превышать 2MB ',
	];
	
    public function render()
    {
    	$checks = Check::query()->with(['userRelationship'])->orderBy('id','desc')->paginate(8);
		try {
			return view('livewire.check-wire',compact('checks'));
		}catch (\Exception $exception){
			return  redirect('check');
		}
    }
	
	/**
	 * @throws \Exception
	 */
	public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
	
	public function updatedImage()
	{
		$validatedData = $this->validate();
		$path = $this->image->hashName();
		$manager = new ImageManagerStatic();
		$image = $manager->make($this->image)->fit(150,100);
		$image->save(storage_path() . '/app/public/' . $path);
		
		$data = new Check();
		$data->user_id = auth()->user()->id;
		if (Carbon::now()->format('h') % 2 == 0) {
			$data->type = Check::PRIZE;
			$data->code = random_int(11111111,99999999);
		}else {
			$data->type = Check::COMMON;
		}
		$data->image = $path;
		$data->status = rand(1,2);
		$data->save($validatedData);
		$this->image = '';
	}
}

<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Image_Category;
use App\Image_groups ;
use App\Image_Product;
use App\Special;
use App\images_Specials;


class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		 Image_Category::deleting(function($Image_Category)
   		 {

	        $Upload=Image_Category::where($Image_Category->id, $id)->pluck('image');
			$file_path_conv=explode("/",$Upload); // converting url path to local path
			$path=implode("\\",$file_path_conv);
			$Fullpath= public_path()."\\".$path;
		    \File::delete($Fullpath);
	    });

	    Image_Product::deleting(function($Image_Product)
   		 {

	        $Upload=Image_Product::where($Image_Product->id, $id)->pluck('image');
			$file_path_conv=explode("/",$Upload); // converting url path to local path
			$path=implode("\\",$file_path_conv);
			$Fullpath= public_path()."\\".$path;
		    \File::delete($Fullpath);
	    });      	

 
	}

}

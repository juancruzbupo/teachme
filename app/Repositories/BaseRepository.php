<?php 
namespace TeachMe\Repositories;

/**
* 
*/
abstract class BaseRepository
{	
	/**
	 *@return \TeachMe\Entities\Entity 
	 */	
	abstract public function getModel();

	/**
	 * @return \Iluminate\Database\Eloquent\Builder
	 */
	public function newQuery()
	{
		return $this->getModel()->newQuery();
	}

	public function findOrFail($id)
	{
		return $this->newQuery()->findOrFail($id); // Ticket::findOrFail($id);
		//en la class newQuery se encuentra los metodos findOrFail where y demas de eloquent
	}

}
<?php 
namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;
/**
* 
*/
class TicketRepository 
{	
	protected function selectTicketList()
	{
		return Ticket::selectRaw(//realiza subconsultas
	            'tickets.*,'
	            .'(select count(*) from ticket_comments where ticket_comments.ticket_id = tickets.id) as num_comments,' 
	            .'(select count(*) from ticket_votes where ticket_votes.ticket_id = tickets.id) as num_votes'
	            )->with('author');
	}
	
	public function paginateLatest()
	{
		return $this->selectTicketList()
					->orderBy('created_at', 'DESC')
        			->paginate(20); 
	}

	public function paginateOpen()
	{
		return $this->selectTicketList()
					->where('status','open')
					->orderBy('created_at', 'DESC')
        			->paginate(20); 
	}

	public function paginateClosed()
	{
		return $this->selectTicketList()
					->where('status','closed')
					->orderBy('created_at', 'DESC')
        			->paginate(20); 
	}

	public function findOrFail($id)
	{
		return Ticket::findOrFail($id);
	}
}
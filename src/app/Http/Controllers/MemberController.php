<?php

namespace App\Http\Controllers;

use App\Event;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Jobs\SendEmail;


class MemberController extends Controller
{

	public function showAllMembers()
	{
		return response()->json(Member::all());
	}

	public function showOneMember($id)
	{
		return response()->json(Member::with('events')->find($id));
	}

	public function eventMembers($id, Request $request)
	{
		$events = Event::with('members')->where('id', $id)->get()->pluck('members');
		$events = $events->count() ? $events[0] : [];
		return response()->json($events);
	}

	public function create(Request $request)
	{

		$this->validate($request, [
			'first_name' => 'required',
			'email' => 'required|email|unique:members',
		]);

		$member = Member::create($request->all());

		if ($request->input('event_id')) {
			$this->setEvent($member->id, $request->input('event_id'));
			$member = Member::with('events')->find($member->id);
		}

		dispatch(new SendEmail($member));

		return response()->json($member, 201);
	}

	public function update($id, Request $request)
	{
		$member = Member::findOrFail($id);
		$member->update($request->all());

		if ($request->input('event_id')) {
			$this->setEvent($member->id, $request->input('event_id'));
			$member = Member::with('events')->find($member->id);
		}

		return response()->json($member, 200);
	}

	public function delete($id)
	{
		Member::findOrFail($id)->delete();
		DB::table('event_members')->where('member_id', $id)->delete();
		return response('Deleted Successfully', 200);
	}

	public function setEvent($member_id, $event_id)
	{
		DB::table('event_members')->where('member_id', $member_id)->where('event_id', $event_id)->delete();
		DB::table('event_members')->insert([
			'member_id' => $member_id,
			'event_id' => $event_id
		]);
	}
}
<?php
namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\QuoteRequest;
use App\Quote;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    public function getIndex()
    {
        $quotes = Quote::all();
        return view('index',['quotes' => $quotes]);
    }

    public function postQuote(Request $request)
    {
        $this->validate($request,[
            'author' => 'required|max:20|alpha',
            'quote' => 'required|max:200'
        ]);


        $authorText = ucfirst($request['author']);
        $quoteText = $request['quote'];
        $author = Author::where('name',$authorText)->first();
        if(!$author){
            $author = new Author();
            $author->name = $authorText;
            $author->save();
        }
        $quote = new Quote();
        $quote-> quote = $quoteText;
        $author->quotes()->save($quote);

        return redirect()->route('index')->with([
            'success' => 'Quote Save'
        ]);


    }
}




?>
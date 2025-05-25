<?php

/**
 * Controller for handling the "About Us" page.
 *
 * This controller retrieves and processes data required for the "About Us" page,
 * including team information, social media data, sponsor details, match results,
 * and image assets. Certain data is cached in the user's session for optimized
 * performance. Twitter feed data is also retrieved for display.
 */

namespace App\Http\Controllers;

use /**
 * The SanitizeSVG class provides functionality for sanitizing
 * SVG files to ensure they are safe for use and free from potentially
 * harmful content such as scripts or malicious code.
 *
 * This class is commonly used to process and sanitize user-uploaded
 * SVG files before they are displayed or stored in an application.
 *
 * Usage of this class helps to mitigate security risks such as Cross-Site
 * Scripting (XSS) or injection attacks that can be present in SVG files.
 */
    App\Helpers\SanitizeSVG;
use /**
 * TwitterHelper provides utility functions for interacting with the Twitter API.
 *
 * This class includes methods to simplify common operations with the Twitter API,
 * such as sending tweets, retrieving user information, and managing timelines.
 */
    App\Helpers\TwitterHelper;
use /**
 * The Images model represents the structure and behavior of image data in the application.
 * It is typically linked to an underlying database table that holds image-related records.
 *
 * This model can be used to perform various operations such as querying, creating,
 * updating, and deleting records within the corresponding images table.
 *
 * Commonly, this model integrates with Laravel's Eloquent ORM to provide
 * standard functionality for database interactions using the application's structure.
 *
 * Responsibilities:
 * - Manage and define relationships between images and other models.
 * - Perform query building and data manipulation specifically for image data.
 * - Offer utility methods or scopes related to images when needed.
 *
 * Note: Specific implementation details or additional functionality depend
 * on the current use case and defined relationships in the application.
 */
    App\Models\Images;
use /**
 * Class Matches
 *
 * This class is an Eloquent model representing the "matches" table in the database.
 * It provides methods and properties to interact with match records.
 *
 * Usage:
 * - Define relationships with other models, such as `hasOne`, `hasMany`, `belongsTo`, or `belongsToMany`.
 * - Use query scopes to filter and query match records efficiently.
 * - Utilize built-in Eloquent methods for CRUD operations.
 *
 * Responsibilities:
 * - Retrieve, create, update, and delete records related to matches in the database.
 * - Define relationships to associate matches with other entities such as users, teams, or leagues.
 *
 * Features:
 * - Integration with Laravel's Eloquent ORM for active record pattern functionality.
 * - Automatic management of timestamps if `$timestamps` is enabled.
 * - Extendable for adding custom methods and logic specifically for the "matches" data.
 */
    App\Models\Matches;
use /**
 * The Socialmedia model represents the data structure for managing
 * social media related information in the application. This model
 * is typically used for storing and retrieving social media account
 * information and associated data from the database.
 *
 * It may include methods for querying, creating, updating, and deleting
 * social media data along with any relationships to other models.
 *
 * The Socialmedia model leverages Laravel's Eloquent ORM for database
 * interaction and may include additional attributes, accessors, mutators,
 * and scopes for handling specific application logic.
 */
    App\Models\Socialmedia;
use /**
 * The Sponsor model represents a sponsor entity in the system.
 * It interacts with the underlying database table associated
 * with sponsor information and provides methods to retrieve and modify
 * sponsor-related data.
 *
 * Responsibilities of this model may include managing sponsor details,
 * relationships with other models, and various queries on sponsor data.
 *
 * This model is typically used in the context of applications requiring
 * sponsor management or associations with other entities such as events.
 */
    App\Models\Sponsor;
use /**
 * The Teams model represents the 'teams' table in the database.
 *
 * It is used to interact with data related to teams, providing methods
 * for querying, creating, updating, and deleting team records.
 *
 * This model may also define relationships with other models,
 * such as users or projects, and implement business logic
 * relevant to teams.
 */
    App\Models\Teams;
use /**
 * The Illuminate\Http\Request class extends Symfony's HttpFoundation\Request class
 * and provides an object-oriented way to interact with HTTP requests within a
 * Laravel application.
 *
 * This class is mainly used for interacting with incoming requests
 * such as accessing request input, headers, cookies, uploaded files,
 * session data, or querying other request-related information.
 *
 * Key Features:
 * - Input Management: Retrieve user input from GET, POST, or JSON payloads.
 * - File Upload handling.
 * - Header and Cookie Management.
 * - Query and retrieve information regarding the request method, URL, and more.
 * - Session interaction and data retrieval.
 *
 * Methods provided by the Request class allow handling and processing
 * of user inputs and other request-related data in a streamlined and
 * Laravel-specific manner.
 */
    Illuminate\Http\Request;

/**
 *
 */
class AboutusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $matchesBefore = Matches::whereIn('result', ['Victoria','Empate','Derrota'])
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();
        $matchesAfter = Matches::where('result', 'Pendiente')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        if(session()->has('image')){
            $image = session()->get('image');
        }else{
            $image = Images::where('type', 'logo')
                ->where('active', 'true')->first();
            session()->put('image', $image);
        }
        if(session()->has('socialmedia')){
            $socialmedias = session()->get('socialmedia');
        }else{
            $socialmedias = Socialmedia::with('medias')->get();
            $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
            session()->put('socialmedias', $socialmedias);
        }
        if(session()->has('imageFondo')){
            $imageFondo = session()->get('imageFondo');
        }else{
            $imageFondo = Images::where('type', 'fondo')
                ->where('active', 'true')->first();
        }
        if(session()->has('sponsors')){
            $sponsors = session()->get('sponsors');
        }else{
            $sponsors = Sponsor::orderBy('tier', 'desc')->get();
            session()->put('sponsors', $sponsors);
        }
        $tweets = TwitterHelper::getTweets();
        if(session()->has('teams')){
            $teams = session()->get('teams');
        }else{
            $teams = Teams::all();
            session()->put('teams', $teams);
        }
        return view('aboutus', ['matchesBefore'=>$matchesBefore, 'matchesAfter' => $matchesAfter,'teams' => $teams, 'sponsors'=>$sponsors, 'tweets' => $tweets,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);
    }
}

@extends('front_end.layout.main')
@section('title', 'Play Guide')
@section('content')

<section class="play-guide-section py-7">
    <div class="container">
        <div class="play-guide-wrapper">


            <div class="play-cards-section">

                <div class="play-guide-heading-image" >
                    <div class="play-guide-image" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/images/league.png') }}" alt="">
                    </div>
                    <div class="play-guide-heading" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-heading">
                        Getting Started with Draft Wayz
                        </h2>
                        <p>
                        Before you dive into the excitement of fantasy football, let’s get you set up:

                        </p>
                    </div>
                </div>

                <div class="start-join-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/build.png') }}" alt="icon">
                        </div>
                        <h3>
                        Sign Up and Set Up Your Account

                        </h3>
                      <ul>
                        <li>
                            <p>
                            Visit the Draft Wayz website or download the app (available on all devices) and sign up using your email or social media account.

                            </p>
                            
                        </li>
                        <li>
                            <p>
                            Complete your profile and customize your account settings.

                            </p>
                        </li>
                        <li>
                            <p>
                            Link your preferred payment method (if applicable) for any league fees or premium features.
                            </p>
                        </li>
                      </ul>
                    </div>

                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/join.png') }}" alt="icon">
                        </div>
                        <h3>
                        Create or Join a League

                        </h3>
                       <ul>
                        <li>
                            <p>
                                <strong>
                                Creating a League:
                                </strong>
                                Set up your own league by choosing your league name, number of teams, and desired league settings (e.g., scoring system, roster sizes, etc.).

                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                Joining a League: 
                                </strong>
                                Join a league by accepting an invitation from a friend or signing up for a public league. Draft Wayz allows you to join multiple leagues for added fun!

                            </p>
                        </li>
                       </ul>
                    </div>
                </div>
            </div>

            <div class="play-cards-section">

                <div class="play-guide-heading-image">
                    <div class="play-guide-heading" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-heading">
                        Understanding the League Setup

                        </h2>
                       
                    </div>
                    <div class="play-guide-image" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/images/team.png') }}" alt="">
                    </div>
               

                </div>

                <div class="prize-wrapper" data-aos="fade-up" data-aos-duration="1000">

                    <div class="play-cards" style="width: 100%;">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/live-draft.png') }}" alt="icon">
                        </div>
                        <h3>
                        League Settings
                        </h3>
                       <ul>
                        <li>
                            <p>
                                <strong>
                                Scoring System:
                                </strong>
                                Customize your league’s scoring system (Standard, PPR, Half-PPR, or custom formats).

                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                Roster Setup:
                                </strong>
                                Set the number of positions for each team (QB, RB, WR, TE, Flex, Kicker, Defense). Customize the bench size and IR slots.

                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                Draft Type:
                                </strong>
                                Choose between various draft formats:

                            </p>
                            <ul>
                                <li>
                                    <p>
                                        <strong>
                                        Snake Draft:
                                        </strong>
                                        Teams take turns picking players in a serpentine order.

                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <strong>
                                        Auction Draft: 
                                        </strong>
                                        Teams bid on players within a budget.

                                    </p>
                                </li>
                            </ul>
                           
                        </li>
                        <li>
                                <p>
                                    <strong>
                                    Waiver System:
                                    </strong>
                                    Choose between traditional waivers or FAAB (Free Agent Acquisition Budget) to add or drop players.

                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                    Playoff Structure:
                                    </strong>
                                    Set the playoff format (e.g., top 6 teams, elimination rounds, etc.).

                                </p>
                            </li>
                       </ul>
                    </div>

                 
                </div>
            </div>

            <div class="play-cards-section">
                <div class="play-guide-heading-image">
                    <div class="play-guide-image" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/images/lineup.png') }}" alt="">
                    </div>
                    <div class="play-guide-heading" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-heading">
                        Drafting Your Fantasy Football Team

                        </h2>
                     
                    </div>
                </div>
                <div class="start-join-wrapper new-lineup-wrapper " data-aos="fade-up" data-aos-duration="1000">
                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/auto-draft.png') }}" alt="icon">
                        </div>
                        <h3>
                        Preparing for the Draft

                        </h3>
                       <ul>
                        <li>
                            <p>
                                <strong>
                                Research Player Rankings:
                                </strong>
                                Draft Wayz provides a comprehensive player database with rankings, stats, and projections. Review these to make informed decisions.

                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                Mock Drafts: 
                                </strong>
                                Practice your draft strategy in mock drafts, available for all league types. This helps you get familiar with player values, strategies, and available draft tools.

                            </p>
                        </li>
                       </ul>
                    </div>

                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/draft-tips.png') }}" alt="icon">
                        </div>
                        <h3>
                        The Draft Process

                        </h3>
                        <ul>
                            <li>
                                <p>
                                    <strong>
                                    Draft Day:
                                    </strong>
                                    Log in to Draft Wayz when your draft begins. The system will automatically set the draft order if you have a Snake Draft or allow you to place bids if you're in an Auction Draft.

                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                    Player Selection: 
                                    </strong>
                                    As your turn arrives, you’ll select a player from the available pool. For Snake drafts, the pick order reverses each round (e.g., 1-10, 10-1). In Auction drafts, you will place bids to acquire players.

                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                    Draft Strategy:
                                    </strong>
                                </p>
                                <ul>
                                    <li>
                                        <p>
                                            <strong>
                                            Balance: 
                                            </strong>
                                            Draft a balanced team, including strong starters and bench players. Prioritize positions like QB, RB, and WR but don't neglect your kicker and defense.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <strong>
                                            Value Picks: 
                                            </strong>
                                            Consider drafting players with potential for breakout seasons or undervalued veterans.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <strong>
                                            Bye Weeks:
                                            </strong>
                                            Be mindful of bye weeks to ensure your team isn’t left short-handed.

                                        </p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                
                </div>
            </div>

            <div class="play-cards-section">
                <div class="play-guide-heading-image">
                 
                    <div class="play-guide-heading" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-heading">
                        Managing Your Fantasy Football Team
                        </h2>
                       
                    </div>
                    <div class="play-guide-image" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/images/scoring.webp') }}" alt="">
                    </div>
                </div>
                <div class="start-join-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/matchup.png') }}" alt="icon">
                        </div>
                        <h3>
                        Weekly Roster Management

                        </h3>
                       <ul>
                        <li>
                            <p>
                                <strong>
                                Set Your Lineup:
                                </strong>
                                Each week, set your starting roster based on player performance, matchups, and injuries. Keep an eye on injury reports and adjust your lineup accordingly.

                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                Make Trades: 
                                </strong>
                                Propose trades with other league members to strengthen your team. Consider player performance, bye weeks, and upcoming matchups when making trade decisions.
                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                Add/Drops:
                                </strong>
                                Use the waiver wire to add free agents and drop underperforming players. Monitor player news and trends to make the best decisions.
                            </p>
                        </li>
                       </ul>
                    </div>

                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/injury.png') }}" alt="icon">
                        </div>
                        <h3>
                        Scoring and Stats
                        </h3>
                       <ul>
                        <li>
                            <p>
                                <strong>
                                Tracking Performance:
                                </strong>
                                Draft Wayz offers real-time player performance tracking. During NFL games, your players will earn points based on their real-life stats (e.g., touchdowns, yards, receptions, etc.).
                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                Scoring Categories:
                                </strong>
                                Understand the scoring categories and how they impact your team’s performance. Points are awarded for various actions, such as touchdowns, field goals, yards, catches, tackles, and more.
                            </p>
                        </li>
                       </ul>
                    </div>

                </div>
            </div>

            <div class="play-cards-section">
                <div class="play-guide-heading-image">
                    <div class="play-guide-image" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/images/trading.png') }}" alt="">
                    </div>
                    <div class="play-guide-heading" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-heading">
                        Advanced Strategies and Tips

                        </h2>
                    </div>
                </div>
                <div class="draft-team-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/projected.png') }}" alt="icon">
                        </div>
                        <h3>
                        Waiver Wire Strategy

                        </h3>
                      <ul>
                        <li>
                            <p>
                                <strong>
                                Early Season:
                                </strong>
                                After the draft, focus on the waiver wire for emerging players or those with favorable schedules. Players like rookie standouts or backups filling in for injuries can be valuable additions.
                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                FAAB Strategy:
                                </strong>
                                If your league uses FAAB, budget your free-agent budget wisely. Place strategic bids on key players, but save some for later in the season when injuries or bye weeks hit hard.

                            </p>
                        </li>
                      </ul>
                    </div>

                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/card1.png') }}" alt="icon">
                        </div>
                        <h3>
                        Trade Tactics
                        </h3>
                        <ul>
                            <li>
                                <p>

                                <strong>
                                Buy Low, Sell High:
                                </strong>
                                Look for players who are underperforming but have the potential to bounce back. Conversely, sell players who are overperforming and may regress.
                                </p>

                            </li>
                            <li>
                                <p>
                                    <strong>
                                    Position Needs:
                                    </strong>
                                    When trading, consider your team’s needs and position yourself to make the best deals. Don’t just trade for star players — balance is key.

                                </p>
                            </li>
                        </ul>
                    </div>

                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/card2.png') }}" alt="icon">
                        </div>
                        <h3>
                        Playoff Preparation

                        </h3>
                        <ul>
                            <li>
                                <p>

                                <strong>
                                Late-Season Moves:
                                </strong>
                                As your league nears the playoffs, focus on matchups and players with favorable schedules. Look for high-performing players on teams pushing for playoff spots.

                                </p>

                            </li>
                            <li>
                                <p>
                                    <strong>
                                    Defensive Matchups:
                                    </strong>
                                    Use your defense wisely, picking teams that face weak offenses in the playoff weeks.

                                </p>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>


            <div class="play-cards-section">
                <div class="play-guide-heading-image">
                    <div class="play-guide-image" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/images/monitoring.jpg') }}" alt="">
                    </div>
                    <div class="play-guide-heading" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-heading">
                        Engaging with the Draft Wayz Community

                        </h2>
                    </div>
                </div>
                <div class="start-join-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/card3.png') }}" alt="icon">
                        </div>
                      <h3>
                      Connect with Other Players

                      </h3>
                        <ul>
                            <li>
                                <p>
                                    <strong>
                                    Social Features:
                                    </strong>
                                    Draft Wayz allows you to connect with friends and fellow players. Share strategies, discuss trades, and engage in friendly banter.

                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                    League Chats: 
                                    </strong>
                                    Use the in-platform chat system to discuss league news, share insights, or just have fun with your fellow competitors.
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/trade.png') }}" alt="icon">
                        </div>
                      <h3>
                      Competitions and Challenges
                      </h3>
                        <ul>
                            <li>
                                <p>
                                    <strong>
                                    Join Special Tournaments:
                                    </strong>
                                    Take part in special challenges or bracket-style tournaments. Compete for prizes and bragging rights!
                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                    Community Events:
                                    </strong>
                                    Participate in community-driven events, polls, or fantasy football discussions for an added competitive and social experience.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="play-cards-section">
                <div class="play-guide-heading-image">
                    <div class="play-guide-image" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/images/prizing.jpg') }}" alt="">
                    </div>
                    <div class="play-guide-heading" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-heading">
                        Playoffs and Championship
                        </h2>
                        <p>
                        As the season wraps up, make sure to position yourself for the playoffs:
                        </p>
                    </div>
                </div>
                <div class="draft-team-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/weiver-wire.png') }}" alt="icon">
                        </div>
                       <h3>
                       Playoff Structure

                       </h3>
                        <ul>
                            <li>
                                <p>
                                    <strong>
                                    Qualification: 
                                    </strong>
                                    The top teams from the regular season qualify for the playoffs. Check your league settings for specific playoff rules and qualifications.
                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                    Bracket Playoffs:
                                    </strong>
                                    Teams face off in head-to-head matchups, with the winners advancing to the next round.
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/monitor.png') }}" alt="icon">
                        </div>
                       <h3>
                       Winning the Championship

                       </h3>
                        <ul>
                            <li>
                                <p>
                                    <strong>
                                    Stay Active:
                                    </strong>
                                    Keep your roster updated and stay engaged throughout the playoffs. Manage your roster to keep an edge over your competitors.
                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                    Final Week: 
                                    </strong>
                                    The team with the most points or wins in the final playoff round is crowned the champion!

                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="play-cards">
                        <div class="play-icons">
                            <img src="{{ asset('assets/images/prize.png') }}" alt="icon">
                        </div>
                       <h3>
                       Continuous Improvement


                       </h3>
                            <p>
                            At Draft Wayz, we’re committed to enhancing your fantasy football experience. Regular updates bring new features, player insights, and more to help you stay ahead of the competition. Always check for new tools, resources, and community events to take your game to the next level.

                            </p>
                    </div>
                </div>

              
            </div>

        </div>
    </div>
</section>

@endsection

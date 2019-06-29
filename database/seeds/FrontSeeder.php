<?php

use Illuminate\Database\Seeder;

class FrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frontDetails = new \App\FrontDetail();
        $frontDetails->header_title = 'Project Management System';
        $frontDetails->image = 'dashboard.jpg';
        $frontDetails->header_description = 'The most powerful and simple way to collaborate with your team';
        $frontDetails->get_started_show = 'yes';
        $frontDetails->sign_in_show = 'yes';
        $frontDetails->feature_title = 'Team communications for the 21st century.';
        $frontDetails->price_title = 'Affordable Pricing';
        $frontDetails->price_description = 'Slack for Teams is a single workspace for your small- to medium-sized company or team.';
        $frontDetails->address = 'Company address';
        $frontDetails->phone = '+91 1234567890';
        $frontDetails->email = 'company@example.com';
        $frontDetails->save();

        $feature = new \App\Feature();
        $feature->title = 'Drag, drop, and share your files.';
        $feature->image = 'drag.png';
        $feature->description = '<p>Not just your messages, but all your files, images, PDFs, documents, and spreadsheets can be dropped right into worksuite and shared with anyone you want. Add comments, star for later reference, and it’s all completely searchable.</p>
                                    <p>If you use any services like Google Drive, Dropbox, or Box, just paste the link and that document is immediately in sync and searchable too.</p>';
        $feature->type = 'image';
        $feature->save();

        $feature = new \App\Feature();
        $feature->title = 'Works everywhere you go';
        $feature->image = 'everywhere.png';
        $feature->description = '<p>Everything in worksuite—messages, notifications, files, and all—is automatically indexed and archived so that you can have it at your fingertips whenever you want. worksuite also indexes the content of every file so you can search within PDFs, Word documents, Google docs, and more. With one search box and a set of powerful search operators, you can slice and dice your way to that one message in your communication haystack.</p>';
        $feature->type = 'image';
        $feature->save();

        $feature = new \App\Feature();
        $feature->title = 'All your tools in one place.';
        $feature->image = 'tools.png';
        $feature->description = '<p>Connect all the tools you use to worksuite and avoid all that constant switching between apps. Set up your integration so that you get all your notifications directly within worksuite—from support requests, code check-ins, and error logs to sales leads—all of them searchable in one central archive.</p>
                                <p>If you use any services like Google Drive, Dropbox, or Box, just paste the link and that document is immediately in sync and searchable too.</p>';
        $feature->type = 'image';
        $feature->save();


        $feature = new \App\Feature();
        $feature->title = 'Responsive';
        $feature->description = 'Your website works on any device: desktop, tablet or mobile.';
        $feature->icon = 'fas fa-desktop';
        $feature->type = 'icon';
        $feature->save();

        $feature = new \App\Feature();
        $feature->title = 'Customizable';
        $feature->description = 'You can easily read, edit, and write your own code, or change everything.';
        $feature->icon = 'fas fa-wrench';
        $feature->type = 'icon';
        $feature->save();

        $feature = new \App\Feature();
        $feature->title = 'UI Elements';
        $feature->description = 'There is a bunch of useful and necessary elements for developing your website.';
        $feature->icon = 'fas fa-cubes';
        $feature->type = 'icon';
        $feature->save();

        $feature = new \App\Feature();
        $feature->title = 'Clean Code';
        $feature->description = 'You can find our code well organized, commented and readable.';
        $feature->icon = 'fas fa-code';
        $feature->type = 'icon';
        $feature->save();

        $feature = new \App\Feature();
        $feature->title = 'Documented';
        $feature->description = 'As you can see in the source code, we provided a comprehensive documentation.';
        $feature->icon = 'far fa-file-alt';
        $feature->type = 'icon';
        $feature->save();

        $feature = new \App\Feature();
        $feature->title = 'Free Updates';
        $feature->description = "When you purchase this template, you'll freely receive future updates.";
        $feature->icon = 'fas fa-download';
        $feature->type = 'icon';
        $feature->save();

//
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class projectTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testcreate_project(){
        $this->withoutExceptionHandling();
        $attribute=[
            'title' => 'hello world',
            'description' => 'i am test the worlds'
        ];
       
        $this->post('/projects',$attribute)->assertRedirect('/project')->assertSessionHasErrors('title');
        $this->assertDatabaseHas('projects',$attribute);
        $this->get('/projects')->assertSee($attribute['title']);

    }

    public function testFields_title(){
        $this->post('/projects',[])->assertSessionHasErrors('title');
    }


    public function testView(){
        $this->get('projects/'.$project_id)->assertSee($project->title)->assertSee($project->description);
            
    }
}

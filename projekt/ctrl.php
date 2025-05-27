<?php
require_once 'init.php';

require_once 'routing.php';


use core\App;
use core\Utils;
use core\SessionUtils;

SessionUtils::loadMessages();


App::getRouter()->setDefaultRoute('redirect'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

//Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('test', 'TestCtrl');

Utils::addRoute('register', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl', ['user', 'lead']);
Utils::addRoute('redirect', 'LoginCtrl', ['user', 'lead']);

        // for users - managing notes
Utils::addRoute('notesList', 'NotesCtrl', ['user', 'lead']);
Utils::addRoute('editNote', 'NotesCtrl', ['user', 'lead']);
Utils::addRoute('saveNote','NotesCtrl', ['user', 'lead']);
Utils::addRoute('addNote', 'NotesCtrl', ['user', 'lead']);
Utils::addRoute('deleteNote', 'NotesCtrl', ['user', 'lead']);

        // for users - managing categories
Utils::addRoute('categoriesList', 'CategoriesCtrl', ['user', 'lead']);
Utils::addRoute('editCategory', 'CategoriesCtrl', ['user', 'lead']);
Utils::addRoute('saveCategory', 'CategoriesCtrl', ['user', 'lead']);
Utils::addRoute('addCategory', 'CategoriesCtrl', ['user', 'lead']);
Utils::addRoute('deleteCategory', 'CategoriesCtrl', ['user', 'lead']);

                                // Old idea

                                        // for admins - managing users
                                //Utils::addRoute('usersList', 'UsersCtrl', 'admin');
                                //Utils::addRoute('filterUsers', 'UsersCtrl', 'admin');
                                //Utils::addRoute('deleteUser', 'UsersCtrl', 'admin');

                                        // for admind - managing groups
                                //Utils::addRoute('fullGroupsList', 'AdminGroupsCtrl', 'admin');
                                //Utils::addRoute('filterGroups', 'AdminGroupsCtrl', 'admin');
                                //Utils::addRoute('addNewGroup', 'AdminGroupsCtrl', 'admin');
                                //Utils::addRoute('deleteGroup', 'AdminGroupsCtrl', 'admin');
                                //Utils::addRoute('addUserToGroup', 'AdminGroupsCtrl', 'admin');

        // new idea - role: lead
        
Utils::addRoute('groupsList', 'GroupsCtrl', ['user', 'lead']);
Utils::addRoute('addGroup', 'GroupsCtrl', 'lead');
Utils::addRoute('enterGroupSpace', 'GroupsCtrl', ['user', 'lead']);
Utils::addRoute('exitGroupSpace', 'GroupsCtrl', ['user', 'lead']);

Utils::addRoute('editGroup', 'GroupsCtrl', 'lead');
// save group
// show user list (for adding to group)
// add user to group
// delete group
// remove user from group
// group categories list
// edit group category
// save group category
// add group category
// delete group category

App::getRouter()->go();
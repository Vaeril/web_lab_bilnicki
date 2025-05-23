<?php
require_once 'init.php';

require_once 'routing.php';


use core\App;
use core\Utils;
use core\SessionUtils;

SessionUtils::loadMessages();


App::getRouter()->setDefaultRoute('redirect'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('test', 'TestCtrl');

Utils::addRoute('register', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl', ['user', 'admin']);
Utils::addRoute('redirect', 'LoginCtrl', ['user', 'admin']);

        // for users - managing notes
Utils::addRoute('notesList', 'NotesCtrl', 'user');
Utils::addRoute('editNote', 'NotesCtrl', 'user');
Utils::addRoute('saveNote','NotesCtrl', 'user');
Utils::addRoute('addNote', 'NotesCtrl', 'user');
Utils::addRoute('deleteNote', 'NotesCtrl', 'user');

        // for users - managing categories
//Utils::addRoute('groupCategoriesList', 'CategoriesCtrl', 'user');
Utils::addRoute('categoriesList', 'CategoriesCtrl', 'user');
//Utils::addRoute('editCategory', 'CategoriesCtrl', 'user');
Utils::addRoute('addCategory', 'CategoriesCtrl', 'user');
//Utils::addRoute('deleteCategory', 'CategoriesCtrl', 'user');

        // for users - managing groups
//Utils::addRoute('groupsList', 'GroupsCtrl', 'user');
//Utils::addRoute('leaveGroup', 'GroupsCtrl', 'user');

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

App::getRouter()->go();
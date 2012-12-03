<?php
/**
 * MediaWiki 马云的旺旺 extension
 *
 * @file
 * @ingroup Extensions
 * @version 0.1
 * @author Praise
 * @link http://lab.cross.hk
 */

if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'This is not a valid entry point to MediaWiki.' );
}

$wgExtensionCredits['parserhook'][] = array(
    'name' => 'MaYunWangWang',
    'author' => 'Praise',
    'version' => '0.1',
    'url' => 'http://www.mediawiki.org/wiki/Extension:MaYunWangWang',
    'description' => '允许在wiki页面插入阿里旺旺，并且点击"和我联系"的按钮时唤起阿里旺旺应用，与其旺旺聊天.',
);

$wgHooks['ParserFirstCallInit'][] = 'registerEmbedWWHandler';

// 注册  <w> 标签
function registerEmbedWWHandler( &$parser ) {
    $parser->setHook( 'w', 'embedWWHandler' );
    return true;
}

function makeHTMLforWW( $input, $argv ) {
    return "$input  <span class=\"J_WangWang\" data-nick=\"$input\" data-tnick=\"$input\" data-display=\"inline\"></span>";
}

function embedWWHandler( $input, $argv ) {
    $input = trim($input);

    if ( !$input ) {
        return '<span style="color: red;">亲，没有提供旺旺数据!</span>';
    }

    return makeHTMLforWW( $input, $argv );
}
?>
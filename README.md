Galerie
=======

A small photo gallery made in PHP/HTML/JS/CSS.

![preview_1500](https://github.com/cisoun/Galerie/assets/930282/42f72615-c702-457d-8dbf-f730173aacbe)

## Features

 - No dependencies
 - Less than 100 lines of code
 - Responsive (masonery style)
 - Dark mode support
 - Custom lightbox with navigation by swiping, arrow keys or click
 - Lazy loading (load images on scroll)
 - Supports JPEG/PNG/GIF/WEBP (can be extended)

## Installation

Just copy [index.php](index.php) and your pictures into a folder on your server.

## F.A.Q

> Can I add another image format?

Yes. Just add the extension in the header PHP code.

> How can I prepare my photos easily?

You can use GraphicsImagick (or ImageMagick) to optimise your photos.  
For instance, transform your photos by running this command:

```sh
for i in *.jpg; do
	gm convert $i -resize 1500x1500 photos/$(basename $i)
done
```

> I don't need lazy loading, how can I remove it?

Remove the `getimagesize` PHP call and the `loading="lazy"` attribute in the `<img>` element. 

## License

Copyright © 2023  Cyriaque Skrapits

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see https://www.gnu.org/licenses.

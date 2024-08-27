# INSTALL

## PHP Libraries

Download and place the necessary files.

## C Libraries

There are four types of C library files

* libdgconfig
* libdgstr (Depends on: libdgconfig)
* libdgmail (Depends on: libdgconfig, libdgstr)
* libdgnetutil (Depends on: libdgconfig, libdgstr)

For libraries with dependencies,

dependencies must be resolved first.

### libdgconfig

After making, place the .a and .so files in the library directory.

```
$ make HAVE_STRNDUP="-DHAVE_STRNDUP"
$ cp libdgconfig.a libdgconfig.so [libdir]/
$ cp libdgconfig.h [includedir]/
```

### libdgstr

libdgconfig must be installed first.

After making, place the .a and .so files in the library directory.

```
$ make HAVE_STRNDUP="-DHAVE_STRNDUP"
$ cp libdgstr.a libdgstr.so [libdir]/
$ cp libdgstr.h [includedir]/
```

### libdgmail

libdgconfig and libdgstr must be installed first.

After making, place the .a and .so files in the library directory.

```
$ make HAVE_STRNDUP="-DHAVE_STRNDUP"
$ cp libdgmail.a libdgmail.so [libdir]/
$ cp libdgmail.h [includedir]/
```

### libdgnetutil

libdgconfig and libdgstr must be installed first.

After making, place the .a and .so files in the library directory.

```
$ make HAVE_STRNDUP="-DHAVE_STRNDUP"
$ cp libdgnetutil.a libdgnetutil.so [libdir]/
$ cp libdgnetutil.h [includedir]/
```
